@extends('layouts.main')
@section('content')
<h2 class="text-3xl font-bold text-center mb-5 text-navbar">Convert Image to Text</h2>
<div class="flex flex-col md:flex-row gap-3 justify-around">
    <form action="{{ route('convert.image') }}" method="POST" enctype="multipart/form-data"
        onsubmit="return submitted()" class="flex md:flex-col gap-3 ">
        @csrf
        <span class="flex-initial w-56 md:w-32">
            <label for="image"
                class="flex items-center justify-center cursor-pointer bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300">
                <i class="fas fa-upload text-2xl"></i>
            </label>
            <input type="file" name="images[]" multiple id="image" class="hidden">
            @if ($errors->any())
                <div class="text-red-700 ml-2 text-xs">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </span>
        <span class="flex-initial w-56 md:w-32">
            <button type="submit" id="btn-convert"
                class="flex items-center justify-center w-full bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300">
                <i class="fas fa-sync-alt text-2xl"></i>
            </button>
        </span>
        <span class="flex-initial w-56 md:w-32">
            <span
                class="flex items-center justify-center w-full bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300"
                id="btn-sophos">
                <p class="font-bold">Sophos</p>
            </span>

            <div id="sophos-options" class="hidden absolute z-10 bg-white border rounded-lg shadow-lg mt-2 w-56">
                <a href="https://10.201.201.2/"
                    class="block p-2 bg-gray-200 text-black rounded-t-lg hover:bg-gray-300 cursor-pointer" target="_blank">BGR</a>
                <a href="https://10.84.254.245/"
                    class="block p-2 bg-gray-200 text-black rounded-t-lg hover:bg-gray-300 cursor-pointer" target="_blank">JTN</a>
                <a href='https://10.80.253.243:4444/'
                    class="block p-2 bg-gray-200 text-black rounded-t-lg hover:bg-gray-300 cursor-pointer" target="_blank">PTM</a>
            </div>
        </span>
        <span class="flex-initial w-56 md:w-32">
            <a href="https://10.80.253.157/"
                class="flex items-center justify-center w-full bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300 font-bold">Sangfor
            </a>
        </span>
    </form>
    <section class="border md:w-4/5 rounded-lg p-2">
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
    </section>
</div>
<script>
    const button = document.getElementById('btn-convert');
    const buttonSophos = document.getElementById('btn-sophos');
    const sophosOptions = document.getElementById('sophos-options');
    button.addEventListener('click', () => {
        document.querySelector('#btn-convert p').style.display = 'none';
        document.querySelector('#btn-convert span').style.display = 'block';
    })
    buttonSophos.addEventListener('click', (e) => {
        e.stopPropagation();
        if (sophosOptions.classList.contains('hidden')) {
            sophosOptions.classList.remove('hidden');
        } else {
            sophosOptions.classList.add('hidden');
        }
    });
    document.addEventListener('click', () => {
        sophosOptions.classList.add('hidden');
    });
    sophosOptions.addEventListener('click', (e) => {
        e.stopPropagation();
    });
</script>
@endsection
