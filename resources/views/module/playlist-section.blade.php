@if (isset($playlist) && count($playlist) !== 0)
    <section class=" bg-gray-100 min-h-full">
        <div class="px-10 py-5">
            <div class="text-2xl mb-3">Playlist Unggulan kami</div>
            <hr>
        </div>
        <div class="flex justify-center">


            @foreach ($playlist as $playlistItem)
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="bg-white p-6 rounded-lg text-sm">
                        <img class="aspect-video rounded w-full object-cover object-center mb-6"
                            src="{{ $playlistItem['snippet']['thumbnails']['high']['url'] }}" alt="content">
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-1">
                            {{ $playlistItem['snippet']['title'] }}</h2>
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font mb-2">
                            {{ $playlistItem['snippet']['channelTitle'] }}</h3>

                        <div class="flex text-sm  border-t border-gray-200 py-2 w-full">
                            <span class="text-gray-500 mb-3">Description: </span>
                            <span onclick="alert(`{{ $playlistItem['snippet']['description'] }}`)"
                                class="cursor-pointer bg-indigo-100 border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded ml-auto md:mt-0">Lihat
                                Deskripsi</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2 w-full">
                            <span class="text-gray-500">Published At : </span>
                            <span class="ml-auto text-gray-900"
                                name="">{{ date('D, d M y', strtotime($playlistItem['snippet']['publishedAt'])) }}</span>
                        </div>
                        <div class="flex border-t border-gray-200 py-2 w-full text-sm">
                            <a target="__blank" href="https://www.youtube.com/playlist?list={{ $playlistItem['id'] }}"
                                class="cursor-pointer bg-indigo-100 border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded mr-auto md:mt-0">Lihat
                                Di Youtube</a>
                            @auth
                                <a href="{{ route('playlistPage', ['id' => $playlistItem['id']]) }}"
                                    class="cursor-pointer bg-indigo-100 border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded ml-auto md:mt-0">Lihat
                                    Detail</a>
                            @endauth
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
