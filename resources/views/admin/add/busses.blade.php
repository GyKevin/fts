<x-app-layout>
<div class="flex flex-nowrap justify-center p-4">
    <div class="flex flex-col  p-4 w-1/2 bg-gray-800 rounded-xl">
        <h2 class="font-bold text-white text-2xl">Add Busses</h2>
        <form action="{{ route('admin.store.busses') }}" method="POST" class="flex flex-col text-gray-400">
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

            <label for="bus_number">Bus Number:</label>
            <input type="text" name="bus_number" id="bus_number" value="{{ old('bus_number') }}" required>
            
            <label for="festival_id">Festival:</label>
            <select name="festival_id" id="festival_id" required>
                <option value="">-- Select a Festival --</option>
                @foreach($festivals as $festival)
                    <option value="{{ $festival->id }}" {{ old('festival_id') == $festival->id ? 'selected' : '' }}>{{ $festival->festival_name }} ({{ $festival->date }})</option>
                @endforeach
            </select>
            
            <label for="driver_id">Driver:</label>
            <select name="driver_id" id="driver_id">
                <option value="">-- Select a Driver --</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }}>{{ $driver->id }}</option>
                @endforeach
            </select>
            
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}" required>
            
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}" required>
            
            <label for="departure_time">Departure Time:</label>
            <input type="datetime-local" name="departure_time" id="departure_time" value="{{ old('departure_time') }}" required>
            
            <label for="arrival_time">Arrival Time:</label>
            <input type="datetime-local" name="arrival_time" id="arrival_time" value="{{ old('arrival_time') }}" required>
            
            <label for="total_seats">Total Seats:</label>
            <input type="number" name="total_seats" id="total_seats" value="{{ old('total_seats') }}" required>
            
            <label for="available_seats">Available Seats:</label>
            <input type="number" name="available_seats" id="available_seats" value="{{ old('available_seats') }}" required>
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
            
            <button class="bg-gray-600 mt-6 rounded-md h-10 hover:bg-gray-500 hover:text-gray-300 transition-all" type="submit">Submit</button>
        </form>
    </div>
</div>
</x-app-layout>