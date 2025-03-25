<x-app-layout>
    <div>
        {{-- header image --}}
        <div class="relative h-96 border-b border-gray-600">
            <img class="w-full h-full object-cover" src="{{ asset('storage/img/homepage-header.png') }}" alt="">
            <div class="absolute inset-0 bg-black/30 backdrop-blur-sm flex flex-col items-center justify-center">
                <h1 class="font-bold text-6xl text-white">Festival Travel System</h1>
                <input type="text" placeholder="Search for festivals" class="w-1/2 p-2 mt-4 rounded-full bg-gray-800 text-white">
            </div>
        </div>
        {{-- current festivals with bookable busses --}}
        <div class="flex flex-wrap">
            @foreach ($festivals as $festival)
                <div class="bg-gray-800 text-white rounded-xl w-1/4 h-96 m-4 drop-shadow-lg">
                    <div class="rounded-t-xl h-64 overflow-hidden border-b-2 border-gray-600">
                        <img class="rounded-t-xl w-full h-full object-cover" src="{{ asset('storage/img/placeholder.jpg') }}" alt="Description">
                    </div>
                    <div class="text-gray-200 p-4">
                        <a href="{{route('festival.show', $festival)}}">
                            <h2 class="font-bold text-xl">{{$festival->festival_name}}</h2>
                        </a>
                        {{-- date & location --}}
                        <p class="text-gray-500">{{$festival->date}} - {{$festival->location}}</p>
        
                        {{-- desc --}}
                        <p class="text-gray-400 line-clamp-2">{{$festival->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>