<x-app-layout>
    <form action="{{route('admin.update.drivers', $driver->id)}}" method="post">
        @csrf
        @method('PUT')
        <p>id: {{$driver->id}}</p>
        <label for="license_number">License Number</label>
        <input type="text" name="license_number" value="{{$driver->license_number}}" required>

        <label for="license_expiry">License Expiry</label>
        <input type="date" name="license_expiry" value="{{$driver->license_expiry}}" required>

        <input type="submit" value="Submit">
    </form>
</x-app-layout>