# Personal Tools Application

**Personal Tools** adalah aplikasi berbasis web yang menyediakan berbagai alat personal seperti catatan, format teks, dan konversi gambar menjadi teks/log. Aplikasi ini dibangun menggunakan Laravel sebagai backend utama dan Flask untuk proses konversi gambar dengan menggunakan mesin Tesseract OCR.

## Fitur

1. **Catatan (Note-taking)**: Aplikasi ini menyediakan fitur untuk membuat, mengedit, dan mengelola catatan pribadi.
2. **Text Formatter**: Fitur ini memungkinkan pengguna untuk memformat teks sesuai kebutuhan, seperti memodifikasi gaya penulisan.
3. **Konversi Gambar ke Teks (OCR)**: Menggunakan Tesseract OCR, aplikasi ini dapat mengkonversi gambar menjadi teks atau log. Proses konversi dilakukan oleh aplikasi Flask yang berkomunikasi dengan Laravel melalui API.

## Teknologi yang Digunakan

- **Laravel**: Sebagai program utama dan pengelola fitur-fitur utama aplikasi.
- **Flask**: Digunakan untuk melakukan konversi gambar menjadi teks dengan menggunakan Tesseract OCR.
- **Tesseract OCR**: Mesin OCR untuk ekstraksi teks dari gambar.
- **Docker** (Opsional): Untuk memudahkan setup.
- **MySQL**: Sebagai database aplikasi yang akan menyimpan catatan

## Instalasi

### Prasyarat
Pastikan Anda sudah menginstal:
- Git
- Docker

### Langkah-langkah Instalasi

1. **Clone repository**:
    ```bash
    git clone https://github.com/misbahul-rafi/notes.git
    cd notes
    ```

2. **Setup environment Laravel**:
    Sesuaikan variabel environment di file `.env`
    ```bash
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```
    Copy file `.env.example` ke `.env`:
    ```bash
    cp .env.prod .env
    ```

4. **Generate key aplikasi Laravel**:
    ```bash
    php artisan key:generate
    ```

5. **Migrate dan Seed database**:
    ```bash
    php artisan migrate --seed
    ```

6. **Install dependencies front-end** (Jika menggunakan Tailwind atau lainnya):
    ```bash
    npm install && npm run dev
    ```

7. **Install dan jalankan Flask (untuk OCR)**:
    - Masuk ke folder `flask-app/`:
      ```bash
      cd flask-app
      ```
    - Buat virtual environment dan aktifkan:
      ```bash
      python3 -m venv venv
      source venv/bin/activate  # Untuk Linux/Mac
      venv\Scripts\activate     # Untuk Windows
      ```
    - Install dependencies Flask:
      ```bash
      pip install -r requirements.txt
      ```
    - Jalankan Flask:
      ```bash
      python run.py
      ```

8. **Jalankan Laravel**:
    ```bash
    php artisan serve
    ```

9. **Akses aplikasi**:
    - Laravel: `http://localhost:8000`
    - Flask API: `http://localhost:5000`

## Struktur Proyek

```bash
personal-tools/
├── app/                # Directory utama Laravel
├── flask-app/          # Directory Flask untuk konversi gambar
├── public/             # Public folder Laravel
├── resources/          # Views dan assets Laravel
├── routes/             # Routing Laravel
├── .env                # Environment file
├── composer.json       # Dependencies PHP
├── package.json        # Dependencies front-end
└── README.md           # Dokumentasi ini
