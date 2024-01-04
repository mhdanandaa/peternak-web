<x-my-app-layout>
    <x-nav-admin></x-nav-admin>
    <div>
        <div class="flex flex-col text-center  mb-10 px-32">
            <input type="text" id="moduleTitle"
                class="border-transparent border-x-0 border-t-0 text-ungu-void bg-meta font-semibold focus:ring-0 border-b-2 m-1 text-center text-4xl"
                value='{{ $module->title ?? '' }}'>
            <textarea id="moduleDescription"
                class="border-transparent border-x-0 border-t-0 focus:ring-0 border-b-2 m-1 bg-meta text-white font-semibold text-center"
                rows="1">{{ $module->description ?? '' }}</textarea>
            <div class="mt-5">

                <span onclick="updateModule({{ $module->id ?? '' }})"
                    class="cursor-pointer inline-flex items-center bg-white text-ungu-void font-semibold border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Simpan
                    Perubahan</span>
            </div>
        </div>
        <div class="mx-20 my-2">
            <ul class="grid grid-flow-col text-center text-biru-tosca font-semibold bg-ungu-font rounded-full p-1">
                <li> <a onclick="toggleTab('#playlist')" href="#playlist" name='navTab'
                        class="flex justify-center py-4">Playlist Video</a> </li>
                <li> <a onclick="toggleTab('#module')" href="#module" name='navTab'
                        class="flex  justify-center text-biru-tosca bg-white rounded-full shadow py-4">Module Settings</a> </li>
            </ul>
        </div>
    </div>
    <section id="moduleTab" name='tab'class="text-gray-600 body-font block bg-meta">
        <div class="container px-5 py-5 mx-auto">


            <div class="flex flex-wrap justify-center -m-4">
                <div onclick="toggleModal('addModuleModal')" class="p-4 md:w-2/5">
                    <div
                        class="flex justify-center items-center rounded-lg h-full text-lg bg-meta border-4 border-ungu-font p-8 flex-col hover:bg-meta-pudar">
                        <div class="flex items-center justify-center">
                            <i class="material-icons text-xl m-1">add</i>
                            <div class="text-xl m-1 text-white">Tambah Modul</div>
                        </div>

                    </div>
                </div>
                @for ($i = 0; $i < count($children); $i++)
                    <div class="p-4 md:w-2/5">
                        <div class="flex rounded-lg h-full bg-meta border-4 border-ungu-font p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <div
                                    class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-ungu-font text-white flex-shrink-0">
                                    <span>{{ $i + 1 }}</span>
                                </div>
                                <h2 class="text-white text-lg title-font font-medium">{{ $children[$i]->title }}</h2>
                            </div>
                            <div class="flex-grow">
                                <div class="flex border-t border-gray-200 py-2 w-full">
                                    <span class="text-white">Created At : </span>
                                    <span class="ml-auto text-white"
                                        name="">{{ $children[$i]->created_at }}</span>
                                </div>
                                <div class="flex border-t border-gray-200 py-2 w-full">
                                    <span class="text-white">Updated At : </span>
                                    <span class="ml-auto text-white"
                                        name="">{{ $children[$i]->updated_at }}</span>
                                </div>
                                <div class="flex  border-t border-gray-200 py-2 w-full">
                                    <span class="text-white mb-3">Description: </span>
                                    <span onclick="alert(`{{ $children[$i]->description }}`)"
                                        class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-meta-pudar rounded text-base ml-auto md:mt-0">Lihat
                                        Deskripsi</span>
                                </div>
                                <div class="flex justify-between mt-3">
                                    <a href='{{ route('dashboard', ['module' => (last($moduleNames) == 'primary' ? '' : join('/', $moduleNames) . '/') . $children[$i]->name]) }}'
                                        class=" text-ungu-font inline-flex items-center">Learn More
                                        <i class="material-icons ml-1">arrow_forward</i>
                                    </a>
                                    <span onclick="deleteModule({{ $children[$i]->id }})"
                                        class="cursor-pointer ml-10 inline-block py-1 px-2 rounded  text-red-500 hover:bg-red-200 text-xs font-medium tracking-widest"><i
                                            class="material-icons text-sm">delete</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <section id="playlistTab" name="tab" class="hidden text-gray-600 body-font">
        <div class="container px-5 py-2 mx-auto">

            <div class="flex flex-wrap justify-center -m-4 p-5">
                <div class="xl:w-1/3 md:w-1/2 p-4" onclick="toggleModal('addPlaylistModal')">
                    <div
                        class="bg-meta border-4 border-ungu-font p-6 rounded-lg flex items-center h-full justify-center hover:bg-meta-pudar cursor-pointer">
                        <i class="material-icons text-xl m-1">add</i>
                        <div class="text-xl m-1">Tambah Playlist</div>
                    </div>
                </div>
                @foreach ($playlist as $playlistItem)
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="bg-meta border-4 border-ungu-font p-6 rounded-lg text-sm">
                            <img class="md:h-44 sm:h-32 lg:h-60 xl:h-48  rounded w-full object-cover object-center mb-6"
                                src="{{ $playlistItem['snippet']['thumbnails']['high']['url'] }}" alt="content">
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-1">
                                {{ $playlistItem['snippet']['title'] }}</h2>
                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font mb-2">
                                {{ $playlistItem['snippet']['channelTitle'] }}</h3>

                            <div class="flex text-sm  border-t border-gray-200 py-2 w-full">
                                <span class="text-white mb-3">Description: </span>
                                <span onclick="alert(`{{ $playlistItem['snippet']['description'] }}`)"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded ml-auto md:mt-0">Lihat
                                    Deskripsi</span>
                            </div>
                            <div class="flex border-t border-gray-200 py-2 w-full">
                                <span class="text-white">Published At : </span>
                                <span class="ml-auto text-gray-900"
                                    name="">{{ date('D, d M y', strtotime($playlistItem['snippet']['publishedAt'])) }}</span>
                            </div>
                            <div class="flex border-t border-gray-200 py-2 w-full text-sm">
                                <a target="__blank"
                                    href="https://www.youtube.com/playlist?list={{ $playlistItem['id'] }}"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded mr-auto md:mt-0">Lihat
                                    Di Youtube</a>
                                <a href="{{ route('playlistPage', ['id' => $playlistItem['id']]) }}"
                                    class="cursor-pointer bg-ungu-font text-white border-0 py-1 px-3 focus:outline-none hover:bg-indigo-200 rounded ml-auto md:mt-0">Lihat
                                    Detail</a>
                                <span onclick="deletePlaylist('{{ $playlistItem['playlistDatabaseId'] }}')"
                                    class="cursor-pointer ml-1 inline-block py-1 px-2 rounded text-red-500 hover:bg-red-200 text-xs font-medium tracking-widest"><i
                                        class="material-icons text-sm">delete</i></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div>
        <x-my-modal id="addModuleModal">
            <div class="flex flex-col row m-5">
                <h1>Tambah Modul</h1>
                <input id="addModuleName" class="m-1 bg-meta-pudar text-white border-b-4 border-ungu-font rounded py-1" type="text" placeholder="Name">
                <input id="addModuleTitle" class="m-1 bg-meta-pudar text-white border-b-4 border-ungu-font rounded py-1" type="text" placeholder="Title">
                <textarea class="m-1 bg-meta-pudar text-white border-b-4 border-ungu-font rounded py-1" id="addModuleDescription" cols="30" rows="3" placeholder="Description"></textarea>
            </div>
            <div class="bg-meta px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button onclick="addModule()" type="button"
                    class="inline-flex w-full justify-center rounded-md bg-ungu-void px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-ungu-font sm:ml-3 sm:w-auto">Submit</button>
                <button type="button" onclick="toggleModal('addModuleModal')"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
        </x-my-modal>
        <x-my-modal id="addPlaylistModal">
            <div class="flex flex-col row m-5">
                <h1>Tambah Playlist</h1>
                <input id="addPlaylistId" class="m-1 bg-meta-pudar text-white border-b-4 border-ungu-font rounded py-1" type="text" placeholder="Id Playlist">
            </div>
            <div class="bg-meta px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button onclick="addPlaylist()" type="button"
                    class="inline-flex w-full justify-center rounded-md bg-ungu-void px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-ungu-font sm:ml-3 sm:w-auto">Submit</button>
                <button type="button" onclick="toggleModal('addPlaylistModal')"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 sm:mt-0 sm:w-auto">Cancel</button>
            </div>
        </x-my-modal>
    </div>
    <script>
        toggleTab()

        function toggleTab(hashProp) {
            const hash = hashProp || window.location.hash || '#module'
            $('section[name=tab].block').removeClass('block').addClass('hidden')
            $('section[name=tab]' + hash + 'Tab').removeClass('hidden').addClass('block')
            $('a[name=navTab].bg-white.rounded-full.shadow').removeClass('bg-white rounded-full shadow')
            $('a[name=navTab][href="' + hash + '"]').addClass('bg-white rounded-full shadow')
        }

        function addModule() {
            const parent_name = window.location.pathname.split('/').at(-1);
            const data = {
                "name": document.getElementById('addModuleName').value,
                "title": document.getElementById('addModuleTitle').value,
                "description": document.getElementById('addModuleDescription').value,
                "parent_name": parent_name ? parent_name : 'primary',
                "_token": '{{ csrf_token() }}',
            }
            $.ajax({
                url: '{{ route('addModule') }}',
                type: 'POST',
                data: data,
                dataType: 'json', // added data type
                success: function(res) {
                    // console.log(res);
                    alert(res.message)
                    window.location.reload();
                },
                error: function(jqXHR, exception) {
                    alert(jqXHR.responseJSON.message)
                }
            });

        }

        function updateModule(id) {
            const data = {
                "id": id,
                "title": document.getElementById('moduleTitle').value,
                "description": document.getElementById('moduleDescription').value,
                "_token": '{{ csrf_token() }}',
            }
            $.ajax({
                url: '{{ route('updateModule') }}',
                type: 'PUT',
                data: data,
                dataType: 'json', // added data type
                success: function(res) {
                    // console.log(res);
                    alert(res.message)
                    window.location.reload();
                },
                error: function(jqXHR, exception) {
                    alert(jqXHR.responseJSON.message)
                }
            });
        }

        function deleteModule(id) {
            if (confirm("Data yang dihapus tidak dapat dikembalikan. Apakah anda yakin?")) {

                $.ajax({
                    url: '{{ route('deleteModule') }}?id=' + id,
                    type: 'DELETE',
                    data: {
                        "_token": '{{ csrf_token() }}',
                    },
                    dataType: 'json', // added data type
                    success: function(res) {
                        // console.log(res);
                        alert(res.message)
                        window.location.reload();
                    },
                    error: function(jqXHR, exception) {
                        alert(jqXHR.responseJSON.message)
                    }
                });
            }
        }

        function deletePlaylist(id) {
            if (confirm("Data yang dihapus tidak dapat dikembalikan. Apakah anda yakin?")) {

                $.ajax({
                    url: '{{ route('deletePlaylist', ['']) }}/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": '{{ csrf_token() }}',
                    },
                    dataType: 'json', // added data type
                    success: function(res) {
                        // console.log(res);
                        // return;
                        alert(res.message)
                        window.location.reload();
                    },
                    error: function(jqXHR, exception) {
                        alert(jqXHR.responseJSON.message)
                    }
                });
            }
        }

        function addPlaylist(params) {
            const data = {
                "playlist_id": document.getElementById('addPlaylistId').value,
                "module_id": '{{ $module->id }}',
                "_token": '{{ csrf_token() }}',
            }
            $.ajax({
                url: '{{ route('addPlaylist') }}?',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(res) {
                    alert(res.message)
                    window.location.reload();
                },
                error: function(jqXHR, exception) {
                    alert(jqXHR.responseJSON.message)
                }
            });
        }
    </script>
    <script>
        function toggleModal(id) {
            document.getElementById(id).style.display = document.getElementById(id).style.display == `block` ? 'none' :
                'block';
        }
    </script>
</x-my-app-layout>
