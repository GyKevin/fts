<x-app-layout>
    <div class="flex flex-nowrap justify-center p-4">
        <div class="flex flex-col  p-4 w-1/2 bg-gray-800 rounded-xl">
            <h2 class="font-bold text-white text-2xl">Add Users</h2>
                <form action="{{route("admin.store.drivers")}}" method="POST" class="flex flex-col text-gray-400">
                    @csrf

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <label for="license_number">License Number</label>
                    <input type="text" name="license_number" value="{{old('license_number')}}" required>

                    <label for="license_expiry">License Expiry</label>
                    <input type="date" name="license_expiry" value="{{old('license_expiry')}}" required>

                    <input type="submit" class="bg-gray-600 mt-6 rounded-md h-10 hover:bg-gray-500 hover:text-gray-300 transition-all" value="Submit">
                </form>
        </div>
    </div>
</x-app-layout>