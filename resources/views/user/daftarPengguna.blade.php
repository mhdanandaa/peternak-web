
<x-my-app-layout>
    <x-navigation></x-navigation>
    <div class="py-12">
        <div class="mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead class="bg-meta text-white">
                          <tr>
                            <th class="px-6 bg-blueGray-50 border-ungu-font text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm border-l-2 border-r-2 whitespace-nowrap font-semibold text-left">
                                          Name
                                        </th>
                           <th class="px-6 bg-blueGray-50 border-ungu-font text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm border-l-2 border-r-2 whitespace-nowrap font-semibold text-left">
                                          Email
                                        </th>
                          <th class="px-6 bg-blueGray-50 border-ungu-font text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm  border-l-2 border-r-2 whitespace-nowrap font-semibold text-left">
                                         Role
                                        </th>
                          </tr>
                        </thead>
                
                        <tbody>
                            @foreach ($users as $user)
                                
                            <tr>
                                <th class="border-t-0 px-6 border-ungu-font align-middle border-l-2 border-r-2 text-sm whitespace-nowrap p-4 text-left text-blueGray-700 ">
                              {{$user['name']}}
                            </th>
                            <td class="border-t-0 px-6 border-ungu-font align-middle border-l-2 border-r-2 text-sm whitespace-nowrap p-4 font-semibold ">
                                {{$user['email']}}
                            </td>
                            <td class="border-t-0 px-6 border-ungu-font align-middle border-l-2 border-r-2 text-sm whitespace-nowrap p-4 font-semibold">
                              {{$user['role']}}
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
