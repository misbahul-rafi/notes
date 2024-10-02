@extends('layouts.main')
@section('content')

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-5">Convert Image to Text</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('convert.image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Upload Image:</label>
                    <input type="file" name="image" id="image" class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">Convert</button>
            </form>

            @if(session('text'))
                <div class="mt-5 bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-semibold text-lg">Extracted Text:</h3>
                    <p class="mt-2 text-gray-700">{{ session('text') }}</p>
                </div>
            @endif
@endsection