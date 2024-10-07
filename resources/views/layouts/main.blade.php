<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Notes</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="font-sans leading-normal tracking-normal">
    <header class="bg-navbar p-4 shadow-md border-b-2 border-black">
        <nav class="mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}"
                class="text-textnavbar hover:text-gray-300 mr-6 text-text font-semibold">Personal Apps</a>
            <x-bi-plus-circle class="text-white hover:text-gray-300 text-lg font-semibold"
                onclick="location.href='{{ route('notes.create')}}'" />
        </nav>
    </header>

    <main class="p-6 bg-basic shadow-md rounded-md border border-gray-300 min-h-[600px]">
        @yield('content')
    </main>
    <footer class="bg-navbar text-center p-4 text-white mt-8">
        <p>&copy; 2024 My Notes</p>
    </footer>

</body>

</html>