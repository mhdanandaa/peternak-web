<section class="text-gray-600 body-font">
    <div class="container px-5 py-5 mx-auto">
        @if(isset($modules,$module))
            <div class="flex flex-col text-center w-full mb-10">
              <div class="sm:text-3xl text-left  mx-12 font-medium title-font text-gray-900 mb-2">{{$module->title}}</div>
                <div class="text-base text-left  text-purple-900 tracking-widest mx-12 font-medium title-font ">{{$module->description}}</div>
            </div>
            <div class="flex flex-wrap justify-center -m-4">
                @for ($i = 0; $i < count($modules); $i++)
                    <div class="p-4 md:w-2/5">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <div
                                    class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                    <span>{{ $i + 1 }}</span>
                                </div>
                                <h2 class="text-gray-900 text-lg title-font font-medium">{{ $modules[$i]->title }}</h2>
                            </div>
                            <div class="flex-grow">
                                <div>
                                    <div class="line-clamp-3 mb-2">
                                        {!! $modules[$i]->description !!}
                                    </div>
                                </div>
                                {{-- <div class="flex border-t border-gray-200 py-2 w-full">
                                    <span class="text-gray-500">Created At : </span>
                                    <span class="ml-auto text-gray-900"
                                        name="">{{ date('D, d M y', strtotime($modules[$i]->created_at)) }}</span>
                                </div>
                                <div class="flex border-y border-gray-200 py-2 w-full">
                                    <span class="text-gray-500">Updated At : </span>
                                    <span class="ml-auto text-gray-900"
                                        name="">{{ date('D, d M y', strtotime($modules[$i]->updated_at)) }}</span>
                                </div> --}}
                                <div class="flex justify-between mt-3">
                                    <a href='{{ route('modulePage', ['module' => (last($moduleNames) == 'primary' ? '' : last($moduleNames).'/').$modules[$i]->name]) }}'
                                        class=" text-indigo-500 inline-flex items-center">Learn More
                                        <i class="material-icons ml-1">arrow_forward</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        @endif

    </div>
</section>
