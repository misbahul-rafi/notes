<div class="relative w-8 h-8 cursor-pointer" onclick="toggleDropdown(event)">
    {{-- <x-bi-clipboard class="text-black hover:text-indigo-600 transition-colors duration-200 text-lg" /> --}}
    <i class="bi bi-clipboard-fill text-white hover:text-buttonHover text-xl"></i>
    <div class="hidden absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-10 dropdown-content">
        <ul class="text-sm text-gray-700">
            <li class="px-4 py-2 rounded-lg hover:bg-gray-300 cursor-pointer" onclick="copyToClipboard()">
                Title
            </li>
            <li class="px-4 py-2 rounded-lg hover:bg-gray-300 cursor-pointer" onclick="copyToClipboard()">
                Closed
            </li>
            <li class="px-4 py-2 rounded-lg hover:bg-gray-300 cursor-pointer" onclick="copyToClipboard()">
                Content
            </li>
        </ul>
    </div>
</div>
