<x-app-layout>
    <form action="{{route('admin.update.busses', $bus->id)}}" method="post">
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
    
    <button type="submit">Submit</button>
    </form>
</x-app-layout>