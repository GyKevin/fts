<x-app-layout>
    <div class="flex flex-nowrap justify-center p-4">
        <div class="flex flex-col  p-4 w-5/6 md:w-1/2 bg-gray-800 rounded-xl">
            <h2 class="font-bold text-white text-2xl">Edit Busses</h2>
                <form action="{{route('admin.update.busses', $bus->id)}}" method="post" class="flex flex-col text-gray-400">
                    @csrf
                    @method('PUT')
                    <label for="bus_number">Bus Number:</label>
                <input type="text" name="bus_number" id="bus_number" value="{{ $bus->bus_number }}" required>
                
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
                <input type="date" name="date" id="date" value="{{ $bus->date }}" required>
                
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" value="{{ $bus->location }}" required>
                
                <label for="departure_time">Departure Time:</label>
                <input type="datetime-local" name="departure_time" id="departure_time" value="{{ $bus->departure_time }}" required>
                
                <label for="arrival_time">Arrival Time:</label>
                <input type="datetime-local" name="arrival_time" id="arrival_time" value="{{ $bus->arrival_time }}" required>
                
                <label for="total_seats">Total Seats:</label>
                <input type="number" name="total_seats" id="total_seats" value="{{ $bus->total_seats }}" required>
                
                <label for="available_seats">Available Seats:</label>
                <input type="number" name="available_seats" id="available_seats" value="{{ $bus->available_seats }}" required>
                
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" id="price" value="{{ $bus->price }}" required>
                
                <button class="bg-gray-600 mt-6 rounded-md h-10 hover:bg-gray-500 hover:text-gray-300 transition-all" type="submit">Submit</button>
                </form>
                <form action="{{route('admin.delete.busses', $bus->id)}}" method="post" class="flex flex-col text-red-400">
                    @csrf
                    @method('DELETE')
                    <input class="bg-gray-600 mt-3 rounded-md h-10 hover:bg-gray-500 hover:text-red-300 transition-all cursor-pointer" type="submit" value="Delete">
                </form>
        </div>
    </div>
</x-app-layout>