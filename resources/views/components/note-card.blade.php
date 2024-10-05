<div
    class="bg-white border border-gray-300 rounded-lg p-4 hover:shadow-lg transition-shadow duration-300 min-h-[200px] flex flex-col justify-between">
    <h2 class="text-lg font-bold mb-2">
        <a href="{{ route('notes.show', $note->id) }}" class="text-blue-600 hover:underline">{{ $note->title }}</a>
    </h2>
    <p class="text-gray-700 mb-4 flex-grow" id="note-content-{{ $note->id }}">{{ Str::limit($note->content, 100) }}</p>
    <div class="flex justify-between items-center">
        <div class="flex space-x-2">
            <x-bi-clipboard onclick="copyToClipboard('note-content-{{ $note->id }}')"
                class="hover:bg-gray-400 w-5 h-5" />
            <x-bi-trash onclick="copyToClipboard('note-content-{{ $note->id }}')" class="hover:bg-gray-400 w-5 h-5" />

            <a href="{{ route('notes.show', $note->id) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Lihat</a>
        </div>
        <span class="text-sm text-gray-500">{{ $note->created_at->format('d M Y') }}</span>
    </div>
</div>