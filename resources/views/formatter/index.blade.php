@extends('layouts.main')

@section('content')
<div class="container mx-auto p-5 bg-white rounded-lg shadow-lg">
  <h1 class="text-2xl font-bold text-center mb-4">SOC Formatter</h1>

  <form action="/format" method="POST">
    @csrf

    <!-- Input teks -->
    <textarea name="text" placeholder="Enter your text here" required
      class="w-full h-40 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>

    <!-- Tombol kategori format -->
    <div class="flex space-x-2 mb-4">
      <button type="submit" name="format" value="webattack"
        class="flex-1 p-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none">Web Attack</button>
      <button type="submit" name="format" value="sophosips"
        class="flex-1 p-2 bg-green-200 text-gray-700 rounded-md hover:bg-green-300 focus:outline-none">Sophos
        IPS</button>
      <button type="submit" name="format" value="sangforips"
        class="flex-1 p-2 bg-red-200 text-gray-700 rounded-md hover:bg-red-300 focus:outline-none">Sangfor IPS</button>
    </div>
  </form>

  <!-- Bagian hasil format -->
  @if (isset($formattedText))
    <div class="mt-6">
    <h2 class="text-xl font-semibold">Formatted Text:</h2>
    <div class="relative">
      <p id="formattedText" class="mt-2 p-4 bg-gray-100 border border-gray-300 rounded-md">{{ $formattedText }}</p>
      <button id="copyBtn" onclick="copyResult()"
      class="absolute top-0 right-0 mt-2 mr-2 px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
      Copy
      </button>
    </div>
    </div>
  @endif
</div>

<script>
  function copyResult() {
    var copyText = document.getElementById("formattedText");
    navigator.clipboard.writeText(copyText.value);
    alert("Copied the text: " + copyText.value);
  }
</script>
@endsection