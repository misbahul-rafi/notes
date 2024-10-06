@extends('layouts.main')

@section('content')

<div class="max-full mx-auto rounded-lg flex-col">
    <h2 class="text-3xl font-bold text-center mb-5 text-navbar">Convert Image to Text</h2>
    <content class="flex flex-col md:flex-row">
        <sidebar class="w-full md:w-1/4 mr-10 mb-5">
            <form action="{{ route('convert.image') }}" method="POST" enctype="multipart/form-data"
                onsubmit="return submitted()">
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

                <button type="submit" id="btn-convert"
                    class="w-full bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300">
                    <p>Convert</p>
                    <x-loader />
                </button>
            </form>
        </sidebar>
        <div class="w-full md:w-3/5 flex flex-col">
            @if (session('response'))
                        @php
                            $response = session('response');
                        @endphp
                        @if (isset($response['error']) && !empty($response['error']))
                            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 border border-red-400">
                                <p>Error: {{ implode(', ', $response['error']) }}</p>
                            </div>
                        @endif
                        @if (isset($response['results']) && !empty($response['results']))
                            @component('components.extracted-card', ['data' => $response])
                            @endcomponent
                        @else
                            <p class="text-gray-600 mt-4">Tidak ada hasil ditemukan.</p>
                        @endif
            @endif
        </div>
    </content>
</div>
<script>
    const button = document.getElementById('btn-convert');
    button.addEventListener('click', () => {
        document.querySelector('#btn-convert p').style.display = 'none';
        document.querySelector('#btn-convert span').style.display = 'block';
    })
</script>
@endsection