@extends('layouts.main')

@section('content')
<x-navigation :currentTitle="'Edit ' . $note->title" />
<h1 class="text-3xl font-bold mb-6">Edit Catatan</h1>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('notes.update', $note->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="title" class="block text-gray-700">Judul</label>
        <input type="text" name="title" class="w-full border border-gray-300 rounded p-2"
            value="{{ old('title', $note->title) }}" required>
    </div>

    <div>
        <label for="content" class="block text-gray-700">Isi</label>
        <textarea name="content" class="w-full border border-gray-300 rounded p-2"
            required>{{ old('content', $note->content) }}</textarea>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
</form>

<a href="{{ route('notes.index') }}"
    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
@endsection