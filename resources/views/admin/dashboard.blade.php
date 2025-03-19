<x-app-layout>
    <div class="flex flex-nowrap justify-between p-4">
        <div class="flex flex-col p-4 w-1/2 mr-4 bg-gray-800 text-white rounded-xl">
            <div class="border-b border-gray-600 text-gray-200">
                <h2 class="font-bold text-2xl">Edit Data</h2>
            </div>
            <div class="flex flex-col text-gray-400">
                <a class="hover:text-gray-200" href="{{route('admin.users')}}">Users</a>
                <a class="hover:text-gray-200" href="{{route('admin.festivals')}}">Festivals</a>
                <a class="hover:text-gray-200" href="{{route('admin.busses')}}">Busses</a>
                <a class="hover:text-gray-200" href="{{route('admin.drivers')}}">Drivers</a>
            </div>
        </div>
        
        <div class="flex flex-col p-4 w-1/2 mr-4 bg-gray-800 text-white rounded-xl">
            <div class="border-b border-gray-600 text-gray-200">
                <h2 class="font-bold text-2xl">Add Data</h2>
            </div>
            <div class="flex flex-col text-gray-400">
                <a class="hover:text-gray-200" href="{{route('admin.add.festivals')}}">Add Festivals</a>
                <a class="hover:text-gray-200" href="{{route('admin.add.busses')}}">Add Busses</a>
                <a class="hover:text-gray-200" href="{{route('admin.add.drivers')}}">Add Drivers</a>
                <a class="hover:text-gray-200" href="{{route('admin.add.users')}}">Add Users</a>
            </div>
        </div>
    </div>
</x-app-layout>