<x-app-layout>
    <form action="{{route('admin.store.busses')}}" method="post">
        @csrf
        <input type="text" name="bus_number" placeholder="Bus number" required>
        {{-- <input type="number" name="festival_id" placeholder="Festival ID" required> --}}
        <select name="festival_id" id="">
            @foreach ($festivals as $festival)
                <option value="{{$festival->id}}">{{$festival->festival_name}}</option>
            @endforeach
        </select>
        <input type="number" name="driver_id" placeholder="Driver ID" required>
        <input type="date" name="date" placeholder="Date" required>
        <input type="text" name="location" placeholder="Location Time" required>
        <input type="datetime-local" name="departure_time" placeholder="Departure" required>
        <input type="datetime-local" name="arrival_time" placeholder="Arrival" required>
        <input type="number" name="total_seats" placeholder="Total seats" required>
        <input type="number" name="available_seats" placeholder="Available seats" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="submit" value="Submit">
    </form>
</x-app-layout>