from flask import request, jsonify, current_app
from app.utils import convert2image, formatting
from app.models.image_model import ImageModel
import os

class ImageController:
    def process_image(self):
        if "images" not in request.files:
            current_app.logger.warning("Request tidak mengandung file 'images'.")
            return jsonify({"error": "Tidak ada file yang dikirim dalam request."}), 400
        
        files = request.files.getlist("images")
        if not files:
            current_app.logger.warning("Tidak ada file yang dipilih oleh user.")
            return jsonify({"error": "Tidak ada file yang dipilih."}), 400
        
        result = []
        for file in files:
            if file.filename == "":
                current_app.logger.warning(f"File dengan nama kosong ditemukan.")
                return jsonify({"error": "File yang diunggah tidak memiliki nama."}), 400
            file_path = os.path.join(current_app.config["UPLOAD_FOLDER"], file.filename)
            
            try:
                if not os.path.exists(current_app.config["UPLOAD_FOLDER"]):
                    current_app.logger.error(f"Folder upload {current_app.config['UPLOAD_FOLDER']} tidak ditemukan.")
                    return jsonify({"error": "Folder upload tidak ditemukan. Silakan hubungi administrator."}), 500
                file.save(file_path)
                current_app.logger.info(f"File {file.filename} berhasil disimpan di {file_path}")
                model = ImageModel(file_path)
                extracted_content = convert2image(model.file_path)
                if extracted_content:
                    result.append(extracted_content)
                    current_app.logger.info(f"Konten berhasil diekstrak dari {file.filename}")
                else:
                    current_app.logger.warning(f"Tidak ada konten yang berhasil diekstrak dari file {file.filename}")
                    return jsonify({"error": f"Tidak ada konten yang dapat diekstrak dari {file.filename}."}), 400

            except OSError as e:
                current_app.logger.error(f"Error file system saat memproses {file.filename}: {str(e)}")
                return jsonify({"error": f"Kesalahan file system saat menyimpan {file.filename}."}), 500

            except Exception as e:
                current_app.logger.error(f"Error tidak terduga saat memproses file {file.filename}: {str(e)}")
                return jsonify({"error": f"Terjadi kesalahan saat memproses {file.filename}. Silakan coba lagi."}), 500

            finally:
                if os.path.exists(file_path):
                    try:
                        os.remove(file_path)
                        current_app.logger.info(f"File {file.filename} berhasil dihapus setelah diproses.")
                    except OSError as e:
                        current_app.logger.error(f"Gagal menghapus file {file.filename}: {str(e)}")
        return formatting(result)
