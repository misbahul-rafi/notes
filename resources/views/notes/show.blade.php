@extends('layouts.main')

@section('content')
<x-navigation :currentTitle="$note->title" />
<h1 class="text-3xl font-bold mb-6">{{ $note->title }}</h1>

<p class="mb-4">{{ $note->content }}</p>

<a href="{{ route('notes.edit', $note->id) }}"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
<a href="{{ route('notes.index') }}"
    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
@endsection