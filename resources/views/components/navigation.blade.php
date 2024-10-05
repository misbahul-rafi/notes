<div class="mb-4">
    <a href="{{ route('notes.index') }}" class="text-blue-500 hover:underline">Home</a>
    @if(isset($currentTitle))
        / <span class="text-gray-500">{{ $currentTitle }}</span>
    @endif
</div>