@if (isset($playlist) && count($playlist) !== 0)
    <section class=" bg-meta min-h-full mb-20">
        <div class="px-10 py-5">
            <div class="text-2xl text-white font-medium mb-3">Playlist Unggulan kami</div>
        </div>
        <div class="flex justify-center">


            @foreach ($playlist as $playlistItem)
                @if (Auth::check())
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="bg-meta border-2 border-ungu-font p-6 rounded-lg text-sm">
                            <img class="aspect-video rounded w-full object-cover object-center mb-6"
                                src="{{ $playlistItem['snippet']['thumbnails']['high']['url'] }}" alt="content">
                            <h2 class="text-lg text-white font-medium title-font mb-1">
                                {{ $playlistItem['snippet']['title'] }}</h2>
                            <h3 class="tracking-widest text-biru-tosca text-xs font-medium title-font mb-2">
                                {{ $playlistItem['snippet']['channelTitle'] }}</h3>

                            <div class="flex text-sm  border-t border-gray-200 py-2 w-full">
                                <span class="text-white mb-3">Description: </span>
                                <span onclick="alert(`{{ $playlistItem['snippet']['description'] }}`)"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-ungu-void rounded ml-auto md:mt-0">Lihat
                                    Deskripsi</span>
                            </div>
                            <div class="flex border-t border-gray-200 py-2 w-full">
                                <span class="text-white">Published At : </span>
                                <span class="ml-auto text-purple-400"
                                    name="">{{ date('D, d M y', strtotime($playlistItem['snippet']['publishedAt'])) }}</span>
                            </div>
                            <div class="flex border-t border-gray-200 py-2 w-full text-sm">
                                <a target="__blank"
                                    href="https://www.youtube.com/playlist?list={{ $playlistItem['id'] }}"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-ungu-void rounded mr-auto md:mt-0">Lihat
                                    Di Youtube</a>
                                <a href="{{ route('playlistPage', ['id' => $playlistItem['id']]) }}"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-ungu-void rounded ml-auto md:mt-0">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endif

                @if (Auth::guest())
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="bg-meta border-2 border-ungu-font p-6 rounded-lg text-sm">
                            <img class="aspect-video rounded w-full object-cover object-center mb-6"
                                src="{{ $playlistItem['snippet']['thumbnails']['high']['url'] }}" alt="content">
                            <h2 class="text-lg text-white font-medium title-font mb-1">
                                {{ $playlistItem['snippet']['title'] }}</h2>
                            <h3 class="tracking-widest text-biru-tosca text-xs font-medium title-font mb-2">
                                {{ $playlistItem['snippet']['channelTitle'] }}</h3>

                            <div class="flex text-sm  border-t border-gray-200 py-2 w-full">
                                <span class="text-white mb-3">Description: </span>
                                <span onclick="alert(`{{ $playlistItem['snippet']['description'] }}`)"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded ml-auto md:mt-0">Lihat
                                    Deskripsi</span>
                            </div>
                            <div class="flex border-t border-gray-200 py-2 w-full">
                                <span class="text-white">Published At : </span>
                                <span class="ml-auto text-purple-400"
                                    name="">{{ date('D, d M y', strtotime($playlistItem['snippet']['publishedAt'])) }}</span>
                            </div>
                            <div class="flex border-t border-gray-200 py-2 w-full text-sm">
                                <a target="__blank"
                                    href="https://www.youtube.com/playlist?list={{ $playlistItem['id'] }}"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded mr-auto md:mt-0">Lihat
                                    Di Youtube</a>
                                <a href="\login"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded ml-auto md:mt-0">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @if (Auth::guest())
            <div class="flex justify-center mt-10">

                <div class="bg-white border-2 border-ungu-font p-6 rounded-lg text-sm h-48 w-3/4 text-center mb-8">
                    <h1 class="font-medium text-3xl text-grey-pudar">Tunggu apa lagi?</h1>
                    <p class="pt-6 pb-8 text-grey-pudart font-medium">Ayo nonton video pembelajaran langsung dari
                        website.</p>
                    <a href="\register"
                        class="cursor-pointer bg-ungu-font text-white border-0 py-3 px-8 focus:outline-none hover:bg-indigo-200 rounded ml-auto md:mt-0">Buat
                        Akun</a>
                </div>
            </div>
        @endif

    </section>
@endif
@include('welcome.footer-section')

