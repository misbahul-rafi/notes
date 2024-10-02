<?php

namespace App\Http\Controllers;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImageConverterController extends Controller
{
  public function convert(Request $request)
  {
    // Validasi input gambar
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);


    $image = $request->file('image');

    // Praproses gambar
    $img = Image::make($image->getRealPath());
    $img->resize(1000, null, function ($constraint) {
      $constraint->aspectRatio();
  })->greyscale()->contrast(15)->sharpen(10);

    // Simpan gambar yang sudah diproses sementara
    $processedImagePath = storage_path('app/public/processed_image.png');
    $img->save($processedImagePath, 100);

    // Jalankan OCR pada gambar yang telah diproses
    $text = (new TesseractOCR($processedImagePath))
      ->psm(6) // Atur sesuai kebutuhan, misalnya 1 atau 3
      ->lang('eng') // Ganti dengan 'eng' jika teks dalam bahasa Inggris
      ->run();
    $text = preg_replace('/Containment.*$/s', '', $text);

    return redirect()->route('convert.image')->with('text', trim($text));
  }
}
