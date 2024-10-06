<div id="popup" class="fixed inset-0 flex items-center justify-center z-20 hidden bg-black bg-opacity-50">
    <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-6 w-11/12 md:w-1/2">
        <h1 class="text-2xl font-bold text-indigo-600 mb-2" id="popup-title"></h1>
        <h3 class="font-semibold">Closed:</h3>
        <p id="popup-closed" class="mb-4"></p>
        <h3 class="font-semibold">Content:</h3>
        <p id="popup-content"></p>
        <button onclick="closePopup()" class="mt-4 text-indigo-500 hover:text-indigo-800 transition-colors">
            Close
        </button>
    </div>
</div>

<script>
    function openModal(title, closed, content) {
        document.getElementById('popup-title').innerText = title;
        document.getElementById('popup-closed').innerText = closed;
        document.getElementById('popup-content').innerText = content;
        document.getElementById('popup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }
</script>
