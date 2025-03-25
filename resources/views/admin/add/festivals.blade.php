<x-app-layout>
    <div class="flex flex-nowrap justify-center p-4">
        <div class="flex flex-col  p-4 w-1/2 bg-gray-800 rounded-xl">
            <h2 class="font-bold text-white text-2xl">Add Users</h2>
                <form action="{{route('admin.store.festivals')}}" method="post" class="flex flex-col text-gray-400">
                    @csrf
                    <label for="festival_name"> Festival Name</label>
                    <input type="text" name="festival_name" required>

                    <label for="date">Festival Date</label>
                    <input type="date" name="date" required>

                    <label for="location">Festival Location</label>
                    <input type="text" name="location" required>

                    <label for="max_participants">Max Participants</label>
                    <input type="number" name="max_participants">

                    <label for="festival_description">Festival Description</label>
                    <textarea name="festival_description"> </textarea>
                    {{-- <input type="text" name="festival_image" placeholder="Image URL"> --}}

                    <label for="registration_deadline">Registration Deadline</label>
                    <input type="date" name="registration_deadline">
                    <input type="submit" class="bg-gray-600 mt-6 rounded-md h-10 hover:bg-gray-500 hover:text-gray-300 transition-all" value="Submit">
                </form>
        </div>
    </div>
</x-app-layout>