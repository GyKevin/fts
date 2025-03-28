<x-app-layout>
    <div class="flex flex-nowrap justify-center p-4">
        <div class="flex flex-col  p-4 w-5/6 md:w-1/2 bg-gray-800 rounded-xl">
            <h2 class="font-bold text-white text-2xl">Edit Festivals</h2>
                <form action="{{route('admin.update.festivals', $festival->id)}}" method="post" class="flex flex-col text-gray-400">
                    @csrf
                    @method('PUT')
                    <label for="festival_name">Festival Name</label>
                    <input type="text" name="festival_name" value="{{$festival->festival_name}}">

                    <label for="date">Festival Date</label>
                    <input type="text" name="date" value="{{$festival->date}}">

                    <label for="location">Festival Location</label>
                    <input type="text" name="location" value="{{$festival->location}}">

                    <label for="max_participants">Festival Capacity</label>
                    <input type="text" name="max_participants" value="{{$festival->max_participants}}">

                    <label for="description">Festival Description</label>
                    {{-- <input type="text" name="description" value="{{$festival->description}}"> --}}
                    <textarea name="description"">{{$festival->description}}</textarea>
                    
                    <input class="bg-gray-600 mt-3 rounded-md h-10 hover:bg-gray-500 hover:text-grey-300 transition-all cursor-pointer"" type="submit" value="Update">
                </form>
                <form action="{{route('admin.delete.festivals', $festival->id)}}" method="post" class="flex flex-col text-red-400">
                    @csrf
                    @method('DELETE')
                    <input class="bg-gray-600 mt-3 rounded-md h-10 hover:bg-gray-500 hover:text-red-300 transition-all cursor-pointer" type="submit" value="Delete">
                    
                </form>
        </div>
    </div>
</x-app-layout>