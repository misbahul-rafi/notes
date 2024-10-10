@if (!empty($data))
    <div id="notification"
        class=" hidden fixed top-4 right-4 bg-green-500 text-white p-2 rounded-lg shadow-lg transition-opacity duration-300 opacity-60"
        role="alert">
        Salinan berhasil ke clipboard!
    </div>
    @foreach ($data['results'] as $res)
        <div
            class="mb-4 border border-black rounded-lg hover:shadow-xl transition-shadow duration-300 bg-cardbody h-max space-y-2 w-full md:w-1/3 bg">
            <section class="p-1 rounded-lg bg-cardheader border-b border-gray-300">
                <span class="flex justify-between items-center">
                    <p
                        class="titlecard text-l font-semibold text-titlecard w-full hover:text-buttonHover cursor-pointer transition-colors duration-200">
                        {{ $res['title'] }}
                    </p>
                    <x-clipboard-dropdown :res="$res" />
                </span>
                <p class="closedcard text-sm text-text pb-2 cursor-pointer">{{ $res['closed'] }}</p>
            </section>
            <p class="contentcard text-xs text-gray-700 p-2">{!! nl2br(e($res['content'])) !!}</p>
        </div>
    @endforeach
@else
    <p class="text-gray-600 text-center">Tidak ada hasil ditemukan.</p>
@endif

<script>
    function toggleDropdown(event) {
        const dropdown = event.currentTarget.querySelector('.dropdown-content');
        dropdown.classList.toggle('hidden');
    }

    function showNotification(message) {
        const notification = document.getElementById('notification');
        notification.textContent = message;
        notification.classList.remove('hidden');
        notification.style.opacity = 1;
        setTimeout(() => {
            notification.style.opacity = 0;
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 300);
        }, 2000);
    }

    function copyToClipboard() {
        const option = event.target.innerText.toLowerCase();
        const classItem = '.' + option + 'card'
        const data = document.querySelector(classItem);
        navigator.clipboard.writeText(data.innerText).then(() => {
            showNotification('Salinan berhasil ke clipboard!');
        }).catch(err => {
            console.error('Gagal menyalin: ', err);
        });
    }
    document.addEventListener('click', function (event) {
        if (!event.target.closest('.w-8.h-8')) {
            document.querySelectorAll('.dropdown-content').forEach(function (dropdown) {
                dropdown.classList.add('hidden');
            });
        }
    });
</script>
