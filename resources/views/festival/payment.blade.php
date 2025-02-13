<x-app-layout>
    <div class="text-white">
        <h1>Payment confirmation</h1>
    </div>
    <div class="text-white">
        <h2>Booking details:</h2>
        <p>Festival: {{$festival->festival_name}}</p>
        <p>Bus: {{$bus->bus_number}}</p>
        <p>Depart from: {{$bus->location}}</p>
        {{-- <p>Price: € {{ $bus->price }}</p> --}}
    </div>
    <form method="POST" action="{{ route('festival.book', $festival) }}">
        @csrf
        <input type="hidden" name="bus_id" value="{{ $bus->id }}">
        <!-- Add payment fields here -->
        <p class="text-white">Price: € {{ $bus->price }}</p>
        @if($user->points >= 20)
            <div class="text-white">
                <input type="checkbox" id="points" name="use_points" value="1">
                <label for="points">Use 20 points for a 15% discount?</label>
            </div>
        @endif
        <button type="submit" class="text-white">Pay Now</button>
    </form>
</x-app-layout>