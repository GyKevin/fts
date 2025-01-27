<x-app-layout>
    <h1 class="text-white">{{ $festival->festival_name }}</h1>
    <div class="text-white">
        <p>Date: {{ $festival->date }}</p>
        <p>Location: {{ $festival->location }}</p>
        <p>Description: {{ $festival->description }}</p>
        <p>Max participants: {{$festival->max_participants}}</p>
    </div>
    <br>
    
    @if (auth()->check())
        @if($festival->busses->count() > 0)
            <form method="POST" action="{{ route('festival.payment', $festival) }}">
                @csrf
                <select name="bus_id">
                    @foreach($festival->busses as $bus)
                        <option value="{{ $bus->id }}">
                            Departure from: {{ $bus->location }},
                            {{$bus->departure_time}}
                            ({{ $bus->available_seats }} seats left)
                            € {{ $bus->price }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="text-white">Book Festival</button>
            </form>
        @else
            <p>No busses available for this festival.</p>
        @endif
    @else
    <p class="text-white">log in to book a bus.</p>
    @endif
    

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</x-app-layout>