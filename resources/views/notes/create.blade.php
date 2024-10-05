@extends('layouts.main')

@section('content')
<x-navigation :currentTitle="'Buat Post Baru'" />
<div class="container mx-auto my-8 p-6 bg-white shadow-md rounded-md">
    <h1 class="text-3xl font-bold mb-6">Buat Post Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notes.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-gray-700">Judul:</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                class="mt-1 block w-full border border-gray-300 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200"
                placeholder="Masukkan judul...">
        </div>

        <div>
            <label for="content" class="block text-gray-700">Isi:</label>
            <textarea name="content" required
                class="mt-1 block w-full border border-gray-300 rounded p-2 focus:border-blue-500 focus:ring focus:ring-blue-200"
                placeholder="Masukkan isi catatan...">{{ old('content') }}</textarea>
        </div>

        <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">Simpan</button>
    </form>
</div>
@endsection