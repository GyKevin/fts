<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-col md:flex-row md:justify-between items-center p-4">
        <div class="flex flex-col p-4 w-5/6 md:w-1/2 mb-4 md:mb-0 md:mr-4 bg-gray-800 text-white rounded-xl">
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
        
        <div class="flex flex-col p-4 w-5/6 md:w-1/2 md:mr-4 bg-gray-800 text-white rounded-xl">
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