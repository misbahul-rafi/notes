<?php

use App\Http\Controllers\FormatterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
  return view('home');
})->name('home');

Route::resource('notes', NoteController::class);

Route::get('/formatter', [FormatterController::class, 'index']);
Route::post('/format', [FormatterController::class, 'format']);
// Route::get('/', function () {
//     return view('home');
// });
