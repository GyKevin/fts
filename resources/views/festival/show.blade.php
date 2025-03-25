<x-app-layout>
    <div>
        {{-- header image --}}
        <div class="relative h-96">
            <img class="w-full h-full object-cover" src="{{ asset('storage/img/placeholder.jpg') }}" alt="{{ $festival->festival_name }}">
            <div class="absolute inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center">
                <h1 class="font-bold text-6xl text-white">{{ $festival->festival_name }}</h1>
            </div>
        </div>

        {{-- festival data --}}
        <div>
            <div class="flex justify-between p-4">
                <div class="flex flex-col p-4 w-full mr-4 bg-gray-800 text-white rounded-xl">
                    <div class="border-b border-gray-600 text-gray-200">
                        <h2 class="font-bold text-2xl">Festival Data</h2>
                    </div>
                    <div class="flex flex-col text-gray-400">
                        <div class="flex flex-col flex-wrap">
                            <p>Date: {{ $festival->date }}</p>
                            <p>Location: {{ $festival->location }}</p>
                            <p>Max participants: {{$festival->max_participants}}</p>
                            <p>Registration Deadline: {{$festival->registration_deadline}}</p>
                        </div>
                        <div class="border-t border-gray-600">
                            <p>{{ $festival->description }}</p>
                        </div>
                        <div class="w-full">
                            @if (auth()->check())
                            @if($festival->buses->count() > 0)
                                <form method="POST" action="{{ route('festival.payment', $festival) }}"
                                class="flex flex-col">
                                    @csrf
                                    <select name="bus_id">
                                        @foreach($festival->buses as $bus)
                                            <option value="{{ $bus->id }}">
                                                Departure from: {{ $bus->location }},
                                                {{$bus->departure_time}}
                                                ({{ $bus->available_seats }} seats left)
                                                € {{ $bus->price }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="bg-gray-600 mt-3 rounded-md h-10 hover:bg-gray-500 hover:text-gray-300 transition-all cursor-pointer">Book Festival</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>