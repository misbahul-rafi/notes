@extends('layouts.main')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-6">Daftar Post</h1>

    @if (session('success'))
        <p class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </p>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($notes as $post)
            <x-note-card :note="$post" />
        @endforeach
    </div>
</div>

<script>
    function copyToClipboard(elementId) {
        const content = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(content).then(() => {
            alert('Isi catatan telah disalin ke clipboard!');
        }, (err) => {
            console.error('Gagal menyalin: ', err);
        });
    }
</script>
@endsection