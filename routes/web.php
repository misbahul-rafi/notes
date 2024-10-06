<?php

use App\Http\Controllers\FormatterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ImageConverterController;

Route::get('/', function () {
  return view('home');
})->name('home');

Route::resource('notes', NoteController::class);

Route::get('/formatter', [FormatterController::class, 'index']);
Route::post('/format', [FormatterController::class, 'format']);

Route::get('/image-converter', [ImageConverterController::class, 'index']);

Route::post('/image-converter', [ImageConverterController::class, 'convert'])->name('convert.image');