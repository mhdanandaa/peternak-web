
<x-my-app-layout>
  <x-nav-admin></x-nav-admin>
    <div class="py-12">
        <div class="mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead class="bg-purple-400 text-white">
                          <tr>
                            <th class="px-6 bg-blueGray-50 border-white text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm border-l-2 border-r-2 whitespace-nowrap font-semibold text-left">
                                          Name
                                        </th>
                           <th class="px-6 bg-blueGray-50 border-white text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm border-l-2 border-r-2 whitespace-nowrap font-semibold text-left">
                                          Email
                                        </th>
                          <th class="px-6 bg-blueGray-50 text-center border-white text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm  border-l-2 border-r-2 whitespace-nowrap font-semibold">
                                         Role
                                        </th>
                          </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($users as $user)
                                
                            <tr>
                                <th class="border-t-0 px-6 border-white align-middle border-l-2 border-r-2 font-semibold text-sm whitespace-nowrap p-4 text-left text-blueGray-700 ">
                              {{$user['name']}}
                            </th>
                            <td class="border-t-0 px-6  border-white align-middle border-l-2 border-r-2 text-sm whitespace-nowrap p-4 font-semibold ">
                                {{$user['email']}}
                            </td>
                            <td class="border-t-0 px-6 text-center border-white align-middle border-l-2 border-r-2 text-sm whitespace-nowrap p-4 font-semibold relative">
                                <span class="relative z-10">{{$user['role']}}</span>
                                @if($user['role'] === 'admin')
                                    <span class="absolute top-0 left-16 h-full bg-purple-500" style="width: 50%;"></span>
                                @elseif($user['role'] === 'member')
                                    <span class="absolute top-0 left-16 h-full bg-green-200" style="width: 50%;"></span>
                                @endif
                            </td>

                          
                        </tr>
                        @endforeach
                    </tbody>
                
                      </table>
                </div>
            </div>
        </div>
    </div>
    
</x-my-app-layout>
