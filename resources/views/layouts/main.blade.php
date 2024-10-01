<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Notes</title>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <header class="bg-blue-600 p-4 shadow-md">
    <nav class="container mx-auto flex justify-between items-center">
      <a href="{{ route('notes.index') }}" class="text-white hover:text-gray-300 mr-6 text-lg font-semibold">Home</a>
      <!-- <a href="{{ route('notes.create') }}" class="text-white hover:text-gray-300 text-lg font-semibold">Buat Notes</a> -->
      <x-bi-plus-circle class="text-white hover:text-gray-300 text-lg font-semibold" onclick="location.href='{{ route('notes.create') }}'" />

    </nav>
  </header>

  <main class="container mx-auto my-8 p-6 bg-white shadow-md rounded-md border border-gray-300 min-h-[600px]">
    @yield('content')
  </main>

  <footer class="bg-blue-600 text-center p-4 text-white mt-8">
    <p>&copy; 2024 My Notes</p>
  </footer>

</body>

</html>
