<x-my-app-layout>
    <x-navigation></x-navigation>
    <section class=" m-2 mb-20">
        <div class="flex flex-wrap w-full h-max">
            <div class="w-full lg:w-8/12 p-2">
                <div>
                    <iframe src="https://www.youtube.com/embed/{{ $video['contentDetails']['videoId'] }}"
                        title="YouTube video player" class="w-full aspect-video rounded-lg" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="mt-2  w-full p-2 rounded-lg">
                    <span class="font-bold text-3xl ">{{ $video['snippet']['title'] }}</span>
                    <hr class="my-2">
                    <div class="flex justify-between w-full">
                        <div class=" flex flex-col">
                            <span class="font-bold  text-sm ">{{ $video['snippet']['channelTitle'] }}</span>
                            <span
                                class="text-sm">{{ date('D, d M y', strtotime($video['snippet']['publishedAt'])) }}</span>
                        </div>
                        <div class="flex flex-row items-center">
                            <div class="flex">
                                <input type="checkbox"
                                    onchange="toggleLike('{{ $video['contentDetails']['videoId'] }}')"
                                    id="{{ 'button-check-' . $video['contentDetails']['videoId'] }}"
                                    class="peer hidden" />
                                <label for="{{ 'button-check-' . $video['contentDetails']['videoId'] }}"
                                    class="flex items-center select-none cursor-pointer rounded-lg border-0
                                    py-2 px-3 font-bold text-gray-400 transition-colors duration-200 ease-in-out  peer-checked:text-red-500 peer-checked:border-gray-200 ">
                                    <i class="material-icons text-sm mr-2">thumb_up</i> Like </label>
                            </div>
                            <div>

                                <span onclick="alert(`{{ $video['snippet']['description'] }}`)"
                                    class="cursor-pointer bg-ungu-font border-0 py-1 px-3 focus:outline-none hover:bg-ungu-void text-white rounded text-base ml-auto md:mt-0">
                                    Deskripsi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 bg-meta-pudar w-full p-2 rounded-lg">
                    <span class="text-white">Catatan</span>
                    <div class="flex flex-col">
                        <input type="text" id="noteTitle"
                            class="border-transparent bg-transparent border-x-0 border-t-0 focus:ring-0 bg-meta border-b-4 border-ungu-font text-xl p-0"
                            placeholder="Title" value="{{ $note['title'] ?? '' }}">
                        <textarea id="noteDescription"
                            class="border-transparent bg-transparent border-x-0 border-t-0 focus:ring-0 bg-meta border-b-4 border-ungu-font  p-0"
                            placeholder="Write a note" rows="3">{{ $note['description'] ?? '' }}</textarea>
                        <div class="mt-2">

                            <span onclick="updateNote()"
                                class="cursor-pointer inline-flex items-center bg-green-100 border-0 py-1 px-3 focus:outline-none hover:bg-green-200 rounded text-base mt-4 md:mt-0">Simpan
                                Perubahan</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ... -->
            <div class="w-full lg:w-1/3 py-1">
                <div class=" rounded-lg h-full lg:bg-meta text-white  py-2">
                    <div class="mb-1">
                        <span class="text-2xl lg:text-base p-2">Playlist Item</span>
                    </div>
                    @foreach ($videosPlaylist as $videoPlaylist)
                        <div onclick="window.location = '{{ route('videoPage', ['playlist_id' => $videoPlaylist['snippet']['playlistId'], 'video_id' => $videoPlaylist['contentDetails']['videoId']]) }}'"
                            class="flex flex-wrap w-full py-2 hover:bg-gray-300 hover:text-ungu-font cursor-pointer">
                            <div class="flex lg:w-5/12 w-full px-1 ">

                                <div class="lg:max-w-lg  mb-2 md:mb-0  aspect-[16/9]">

                                    <img class=" rounded-lg object-cover object-center aspect-video" alt="hero"
                                        name="videoThumbnail"
                                        src="{{ $videoPlaylist['snippet']['thumbnails']['high']['url'] }}">
                                </div>
                            </div>

                            <div class="flex flex-col w-full  lg:w-7/12 px-1  ">
                                <p class="truncate ... font-bold">{{ $videoPlaylist['snippet']['title'] }}</p>
                                <div class="break-words ">

                                    <span class="font-bold truncate  "></span>
                                </div>
                                <span class="text-sm">{{ $videoPlaylist['snippet']['channelTitle'] }}</span>
                                <span
                                    class=" text-sm">{{ date('D, d M y', strtotime($videoPlaylist['snippet']['publishedAt'])) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

    </section>
    <script>
        function updateNote() {
            const data = {
                "title": document.getElementById('noteTitle').value,
                "note": document.getElementById('noteDescription').value,
                "_token": '{{ csrf_token() }}',
            }
            $.ajax({
                url: '{{ route('updateNote', ['video_id' => $video['contentDetails']['videoId']]) }}?',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(res) {
                    // console.log(res);
                    alert(res.message)
                    // window.location.reload();
                },
                error: function(jqXHR, exception) {
                    alert(jqXHR.responseJSON.message)
                }
            });
        }

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
        @include('welcome.footer-section')

</x-my-app-layout>
