<x-app-layout>
    <div class="text-white">
        <h1>My bookings:</h1>
        @foreach ($registrations as $registration)
            <div class="text-white">
                <h3>Festival: {{$registration->festival->festival_name}}</h3>

            </div>
            
        @endforeach
    </div>
</x-app-layout>