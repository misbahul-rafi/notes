@if (!empty($data))
    @foreach ($data['results'] as $res)
        <div class="mb-4 border border-black rounded-lg hover:shadow-xl transition-shadow duration-300 bg-backgroundcard">
            <div class="flex justify-between items-start">
                <div class="flex-1 space-y-2">
                    <section class="p-1 rounded-lg bg-headercard border-b border-gray-300">
                        <span class="flex justify-between items-center">
                            <p
                                class="text-l font-semibold text-titlecard w-full hover:text-indigo-700 transition-colors duration-200">
                                {{$res['title']}}
                            </p>
                            <i class="w-8 h-8">
                                <x-bi-clipboard
                                    class="text-black hover:text-indigo-600 cursor-pointer transition-colors duration-200" />
                            </i>
                        </span>
                        <span class="flex justify-between pb-2">
                            <p class="text-sm text-text">{{ $res['closed'] }}</p>
                        </span>
                    </section>
                    <span>
                        <p class="text-xs text-gray-700 p-2">{!! nl2br(e($res['content'])) !!}</p>
                    </span>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p class="text-gray-600 text-center">Tidak ada hasil ditemukan.</p>
@endif