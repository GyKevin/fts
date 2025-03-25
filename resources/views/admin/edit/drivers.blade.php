<x-app-layout>
    <div class="flex flex-nowrap justify-center p-4">
        <div class="flex flex-col  p-4 w-1/2 bg-gray-800 rounded-xl">
            <h2 class="font-bold text-white text-2xl">Edit Drivers</h2>
                <form action="{{route('admin.update.drivers', $driver->id)}}" method="post" class="flex flex-col text-gray-400">
                    @csrf
                    @method('PUT')
                    {{-- <p>id: {{$driver->id}}</p> --}}

                    <label for="id">ID/label> </label>
                    <input class="text-black" type="text" name="id" value="{{$driver->id}}" readonly required>

                    <label for="license_number">License Number</label>
                    <input type="text" name="license_number" value="{{$driver->license_number}}" required>

                    <label for="license_expiry">License Expiry</label>
                    <input type="date" name="license_expiry" value="{{$driver->license_expiry}}" required>

                    <input class="bg-gray-600 mt-3 rounded-md h-10 hover:bg-gray-500 hover:text-grey-300 transition-all cursor-pointer" type="submit" value="Submit">
                </form>
                <form action="{{route('admin.delete.drivers', $driver->id)}}" method="post" class="flex flex-col text-red-400">
                    @csrf
                    @method('DELETE')
                    <input class="bg-gray-600 mt-3 rounded-md h-10 hover:bg-gray-500 hover:text-red-300 transition-all cursor-pointer" type="submit" value="Delete">
                </form>
        </div>
    </div>
</x-app-layout>