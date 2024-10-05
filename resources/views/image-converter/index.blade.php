@extends('layouts.main')
@section('content')

<div class="max mx-auto bg-white rounded-lg">
    <h2 class="text-3xl font-bold text-center mb-3 text-indigo-600">Convert Image to Text</h2>

    <form action="{{ route('convert.image') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
        @csrf
        <div class="mb-5">
            <label for="images" class="block text-sm font-medium text-gray-800">Upload Image:</label>
            <input type="file" name="images[]" multiple id="image"
                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @if ($errors->any())
                <div class="text-red-700 ml-2 text-xs">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
            Convert
        </button>
    </form>

    @if (session('response'))
        <div class="response-data mt-5">
            <h2 class="text-base font-semibold text-indigo-500 mb-6">Extracted Images</h2>
            @php
                $response = session('response');
            @endphp

            @if (isset($response['error']) && !empty($response['error']))
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 border border-red-400">
                    <p>Error: {{ implode(', ', $response['error']) }}</p>
                </div>
            @endif

            @if (isset($response['results']) && !empty($response['results']))
                @foreach ($response['results'] as $res)
                    <div class="bg-gray-50 p-2 rounded-lg shadow-md mb-6 border border-gray-200 flex justify-between items-start">
                        <div class="flex-1 w-full space-y-2">
                            <span class="flex justify-between">
                                <p class="w-4/5 text-base font-medium">{{$res['title']}}</p>
                            </span>
                            <span class="flex justify-between">
                                <p class="w-4/5 text-sm">{{$res['closed']}}</p>
                                <x-bi-clipboard class="w-5 h-5" />
                            </span>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-600 mt-4">Tidak ada hasil ditemukan.</p>
            @endif
        </div>
    @endif
</div>

@endsection