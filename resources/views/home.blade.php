<x-app-layout>
    <div>
        {{-- header image --}}
        <div class="relative h-96 border-b border-gray-600">
            <img class="w-full h-full object-cover" src="{{ asset('storage/img/homepage-header.png') }}" alt="">
            <div class="absolute inset-0 bg-black/30 backdrop-blur-sm flex flex-col items-center justify-center">
                <h1 class="font-bold text-3xl sm:text-4xl md:text-6xl text-white">Festival Travel System</h1>
                <form method="GET" action="{{ route('home') }}" class="relative w-1/2 mt-4">
                    <input 
                        type="text" name="search" placeholder="Search for festivals" value="{{ request('search') }}" 
                        class="w-full p-2 px-4 rounded-full bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <button type="submit" class="absolute right-3 top-2 text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        {{-- current festivals with bookable busses --}}
        <div class="flex flex-wrap flex-col md:flex-row items-center justify-center">
            @foreach ($festivals as $festival)
                <div class="bg-gray-800 text-white rounded-xl w-5/6 md:w-1/4 h-96 m-4 drop-shadow-lg">
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