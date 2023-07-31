<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Lists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                          <thead class="bg-blue-300 border-b">
                            <tr>
                              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                #
                              </th>
                              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                {{__("Name")}}
                              </th>

                              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $category )


                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{$category->name}}
                              </td>

                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                 <div class="flex flex-row gap-3">
                                    <a href="{{route("categories.show", $category)}}" class="text-blue-700">{{__("View")}}</a>
                                    <a href="{{route("categories.edit", $category)}}" class="text-green-700">{{__("Edit")}}</a>
                                    <a href="{{route("categories.destroy", $category)}}" class="text-red-700">{{__("Delete")}}</a>
                                 </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
