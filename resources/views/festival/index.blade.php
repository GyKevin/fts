<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Festivals') }}
        </h2>
</x-slot>
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
</x-app-layout>
