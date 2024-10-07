@extends('layouts.main')
@section('content')
<h2 class="text-2xl font-semibold mb-20 text-center text-titlepage">Fitur Utama</h2>
<div class="flex flex-col justify-around md:flex-row gap-3 items-center ">
    <a href="notes"
        class="bg-navbar rounded-lg shadow-lg p-6 flex flex-col items-center transition-transform duration-200 hover:shadow-xl w-80 hover:bg-gray-100">
        <i class="fas fa-sticky-note text-4xl text-titlepage mb-4"></i>
        <h3 class="text-xl font-bold text-titlepage">Notes</h3>
    </a>
    <a href="formatter"
        class="bg-navbar rounded-lg shadow-lg p-6 flex flex-col items-center transition-transform duration-200 hover:shadow-xl w-80 hover:bg-gray-100">
        <i class="fas fa-font text-4xl text-titlepage mb-4"></i>
        <h3 class="text-xl font-bold text-titlepage">Formatter</h3>
    </a>
    <a href="image-converter"
        class="bg-navbar rounded-lg shadow-lg p-6 flex flex-col items-center transition-transform duration-200 hover:shadow-xl w-80 hover:bg-gray-100">
        <i class="fas fa-image text-4xl text-titlepage mb-4"></i>
        <h3 class="text-xl font-bold text-titlepage">Image Converter</h3>
    </a>
</div>
@endsection