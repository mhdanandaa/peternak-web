<x-my-app-layout>
    <x-navigation></x-navigation>
    <section>
        @foreach ($videos as $video)
        {{-- @dump($video) --}}
            <div class="container mx-auto flex px-2 py-5 md:flex-row flex-col items-center bg-meta">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-full mb-10 md:mb-0 p-auto px-3">
                    <img class="object-cover object-center rounded m-auto" style="width: 400px;height: 225px;"
                        alt="hero" name="videoThumbnail" src="{{ $video['snippet']['thumbnails']['high']['url'] }}">
                </div>
                <div
                    class="lg:flex-grow text-sm lg:w-full md:w-1/2 w-full md:p-auto flex flex-col md:items-start px-3 lg:pr-20  md:text-left items-center text-center">
                    <h1 class="title-font  text-3xl mb-4 font-medium text-white" name="videoTitle">
                        {{ $video['snippet']['title'] }}
                    </h1>
                    <div class="flex border-t border-ungu-font py-2 w-full">
                        <span class="text-gray-500">Channel</span>
                        <span class="ml-auto text-white"
                            name="videoChannel">{{ $video['snippet']['channelTitle'] }}</span>
                    </div>
                    <div class="flex border-t border-ungu-font py-2 w-full">
                        <span class="text-gray-500">Published at: </span>
                        <span class="ml-auto text-white"
                            name="">{{ date('D, d M y', strtotime($video['snippet']['publishedAt'])) }}</span>
                    </div>
                    <div class="flex border-t border-ungu-font py-2 w-full">
                        <span class="text-gray-500 mb-3">Description: </span>
                        <span onclick="alert(`{{ $video['snippet']['description'] }}`)"
                            class="cursor-pointer text-white bg-ungu-font border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded text-base ml-auto md:mt-0">Lihat
                            Deskripsi</span>
                    </div>
                    <div class="w-full flex">
                        <a href="{{ route('videoPage', ['playlist_id'=>$video['snippet']['playlistId'],'video_id' => $video['contentDetails']['videoId']]) }}"
                            class="inline-flex text-white bg-ungu-font border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-sm">Lihat
                            detail</a>
                        <div class="flex">
                            <input type="checkbox" onchange="toggleLike('{{ $video['id'] }}')"
                                id="{{ 'button-check-' . $video['id'] }}" class="peer hidden" />
                            <label for="{{ 'button-check-' . $video['id'] }}"
                                class="flex items-center select-none cursor-pointer rounded-lg border-0
                           py-2 px-3 font-bold text-gray-400 transition-colors duration-200 ease-in-out  peer-checked:text-red-500 peer-checked:border-ungu-font ">
                                <i class="material-icons text-sm mr-2">thumb_up</i> Like </label>
                        </div>



                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <script>
        activateLike()
        function activateLike() {
            let cookies = JSON.parse(getCookie('videoLikes')) || {}
            Object.keys(cookies).forEach(function(key, index) {
                if (document.getElementById('button-check-' + key) != undefined) {
                    document.getElementById('button-check-' + key).checked = cookies[key]
                }
            });

        }

        function toggleLike(id) {
            let cookies = JSON.parse(getCookie('videoLikes')) || {}
            cookies[id] = cookies[id] !== undefined ? !cookies[id] : true


            setCookie('videoLikes', JSON.stringify(cookies), 360)
        }

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                c = c.split('=')
                if (c[0] == name) return c[1];
            }
            return null;
        }
    </script>
</x-my-app-layout>
