<x-my-app-layout>
    <x-navigation></x-navigation>
    <section class="mx-10">
        <select onchange="toggleTab(this.value)"
            class="cursor-pointer text-white bg-ungu-font border-0 py-1 px-3 focus:outline-none hover:bg-ungu-void rounded text-base mb-2 md:mt-0"
            name="" id="">
            <option value="saved" selected>Saved video</option>
            <option value="liked">Liked video</option>
        </select>
        <div id="saved-video-list">

            <div  style="display: none" class=" bg-gray-600 p-2 flex items-center ">
                <div class="w-1/6 mx-1">
                    <img src="https://i.ytimg.com/vi/mD6uSGSjgr4/hqdefault.jpg" alt=""
                        class="rounded-lg object-cover object-center w-full aspect-video">
                </div>
                <div class="mx-1 w-4/6 h-full flex flex-col ">
                    <article class="line-clamp-1 text-lg text-white">
                        <h1>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, vero, ullam expedita
                            consequuntur nesciunt ipsum maiores consequatur laudantium eos ipsa nobis deserunt id animi?
                            Officia at cum voluptate expedita in! Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Possimus, quaerat. Explicabo quos sit sint aut eveniet possimus blanditiis velit ipsum
                            aliquam eos assumenda at aspernatur sapiente beatae, quo odit maxime.
                        </h1>
                    </article>
                    <h1 class="text-sm text-white">
                        chanel
                    </h1>
                </div>
                <div class="flex flex-col items-center">
                    <a href=""
                        class="cursor-pointer text-white bg-ungu-font border-0 py-1 px-3 focus:outline-none hover:bg-ungu-void rounded text-base mb-2 md:mt-0"
                        data-aos="fade-right">Lihat
                        detail</a>
                    <a href=""
                        class="cursor-pointer text-white bg-red-500 border-0 py-1 px-3 focus:outline-none hover:bg-red-700 rounded text-base ml-auto md:mt-0"
                        data-aos="fade-right">Lihat
                        di youtube</a>
                </div>
            </div>
        </div>
        <div id="liked-video-list" style="display: none">

            <div style="display: none"  class=" bg-gray-600 p-2 flex items-center ">
                <div class="w-1/6 mx-1">
                    <img src="https://i.ytimg.com/vi/mD6uSGSjgr4/hqdefault.jpg" alt=""
                        class="rounded-lg object-cover object-center w-full aspect-video">
                </div>
                <div class="mx-1 w-4/6 h-full flex flex-col ">
                    <article class="line-clamp-1 text-lg text-white">
                        <h1>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, vero, ullam expedita
                            consequuntur nesciunt ipsum maiores consequatur laudantium eos ipsa nobis deserunt id animi?
                            Officia at cum voluptate expedita in! Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Possimus, quaerat. Explicabo quos sit sint aut eveniet possimus blanditiis velit ipsum
                            aliquam eos assumenda at aspernatur sapiente beatae, quo odit maxime.
                        </h1>
                    </article>
                    <h1 class="text-sm text-white">
                        chanel
                    </h1>
                </div>
                <div class="flex flex-col items-center">
                    <a href=""
                        class="cursor-pointer text-white bg-ungu-font border-0 py-1 px-3 focus:outline-none hover:bg-ungu-void rounded text-base mb-2 md:mt-0"
                        data-aos="fade-right">Lihat
                        detail</a>
                    <a href="" target="_blank"
                        class="cursor-pointer text-white bg-red-500 border-0 py-1 px-3 focus:outline-none hover:bg-red-700 rounded text-base ml-auto md:mt-0"
                        data-aos="fade-right">Lihat
                        di youtube</a>
                </div>
            </div>

        </div>
    </section>
    <script>
        getDataSaved()
        getDataLiked()

        function getDataSaved() {
            let listId = JSON.parse(getCookie('videoSaved'))
            if (listId !== null) {

                id = Object.entries(listId).map((a) => a[0])
                $.ajax({
                    url: "https://www.googleapis.com/youtube/v3/videos?key=AIzaSyCkzcwSJNguHaybXQyYwZmfcpPEo4fVYQ8&part=snippet&maxResults=50&id="+id.join(','),
                    success: function(result) {
                        const container = document.getElementById("saved-video-list")
                        result['items'].map((item) =>{
                            const clone = container.children[0].cloneNode(true)
                            clone.style.display = "flex"
                            clone.children[0].children[0].src = item['snippet']['thumbnails']['high']['url']
                            clone.children[1].children[0].children[0].innerHTML = item['snippet']['title']
                            clone.children[1].children[1].innerHTML = item['snippet']['channelTitle']
                            clone.children[2].children[0].href = listId[item['id']]+"/"+item['id']
                            clone.children[2].children[1].href = "https://www.youtube.com/watch?v="+item['id']
                            container.append(clone)
                        })
                    }
                });
            }
        }
        function getDataLiked() {
            let listId = JSON.parse(getCookie('videoLikes'))
            if (listId !== null) {

                id = Object.entries(listId).map((a) => a[0])
                $.ajax({
                    url: "https://www.googleapis.com/youtube/v3/videos?key=AIzaSyCkzcwSJNguHaybXQyYwZmfcpPEo4fVYQ8&part=snippet&maxResults=50&id="+id.join(','),
                    success: function(result) {
                        const container = document.getElementById("liked-video-list")
                        console.log(result);
                        result['items'].map((item) =>{
                            const clone = container.children[0].cloneNode(true)
                            clone.style.display = "flex"
                            clone.children[0].children[0].src = item['snippet']['thumbnails']['high']['url']
                            clone.children[1].children[0].children[0].innerHTML = item['snippet']['title']
                            clone.children[1].children[1].innerHTML = item['snippet']['channelTitle']
                            clone.children[2].children[0].href = listId[item['id']]+"/"+item['id']
                            clone.children[2].children[1].href = "https://www.youtube.com/watch?v="+item['id']
                            container.append(clone)
                        })
                    }
                });
            }
        }

        function toggleTab(value) {
            document.getElementById(value == "liked" ? "liked-video-list" : "saved-video-list").style.display = "block"
            document.getElementById(value == "liked" ? "saved-video-list" : "liked-video-list").style.display = "none"
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
