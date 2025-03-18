<x-app-layout>
    <form action="{{route("admin.store.drivers")}}" method="POST">
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

        <input type="submit" value="Submit">
    </form>
</x-app-layout>