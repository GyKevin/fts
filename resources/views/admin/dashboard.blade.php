<x-app-layout>
    <a class="text-white" href="{{route('admin.users')}}">Users</a>
    <a class="text-white" href="{{route('admin.festivals')}}">Festivals</a>
    <a class="text-white" href="{{route('admin.busses')}}">Busses</a>
    <a class="text-white" href="{{route('admin.drivers')}}">Drivers</a>
    <br>
    <a class="text-white" href="{{route('admin.add.festivals')}}">Add Festival</a>
    <a class="text-white" href="{{route('admin.add.busses')}}">Add Bus</a>
    <a class="text-white" href="{{route('admin.add.drivers')}}">Add Drivers</a>
    <a class="text-white" href="{{route('admin.add.users')}}">Add Users</a>
</x-app-layout>