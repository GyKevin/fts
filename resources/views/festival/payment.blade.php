<x-app-layout>
    {{-- <div class="text-white">
        <h1>Payment confirmation</h1>
    </div>
    <div class="text-white">
        <h2>Booking details:</h2>
        <p>Festival: {{$festival->festival_name}}</p>
        <p>Bus: {{$bus->bus_number}}</p>
        <p>Depart from: {{$bus->location}}</p>
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
    </form> --}}
    <div class="flex flex-nowrap justify-center p-4">
        <div class="flex flex-col  p-4 w-5/6 md:w-1/2 bg-gray-800 rounded-xl text-gray-400">
            <h2 class="font-bold text-white text-2xl">Confirm Booking Payment</h2>
            <div>
                <h4 class="font-bold text-xl">Booking details:</h4>
                <p>Festival: {{$festival->festival_name}}</p>
                <p>Bus: {{$bus->bus_number}}</p>
                <p>Depart from: {{$bus->location}}</p>
                <p>Departure Time: {{$bus->departure_time}}</p>
            </div>
            <form method="POST" action="{{ route('festival.book', $festival) }}">
                @csrf
                <input type="hidden" name="bus_id" value="{{ $bus->id }}">
                <!-- Add payment fields here -->
                <p>Price: € {{ $bus->price }}</p>
                @if($user->points >= 20)
                    <div>
                        <input type="checkbox" id="points" name="use_points" value="1">
                        <label for="points">Use 20 points for a 15% discount?</label>
                    </div>
                @endif
                <button type="submit" class="bg-gray-600 mt-4 w-36 rounded-md h-10 hover:bg-gray-500 hover:text-gray-300 transition-all">Pay Now</button>
            </form>
        </div>
    </div>
</x-app-layout>