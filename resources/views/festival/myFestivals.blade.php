<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>
    <div class="flex flex-wrap flex-col lg:flex-row items-center justify-center">
        @foreach ($registrations as $registration)
            <div class="bg-gray-800 text-white rounded-xl w-5/6 lg:w-1/4 h-96 m-4">
                <div class="rounded-t-xl h-48 overflow-hidden">
                    <img class="rounded-t-xl w-full h-full object-cover" src="{{ asset('storage/img/placeholder.jpg') }}" alt="Description">
                </div>
                <div class="text-gray-200 p-4">
                    <h2 class="font-bold text-xl">{{$registration->festival->festival_name}}</h2>
                    {{-- date & location --}}
                    <p class="text-gray-500">{{$registration->festival->date}} - {{$registration->bus->location}}</p>
    
                    {{-- desc --}}
                    <p class="text-gray-400">Departure: {{$registration->bus->departure_time}}</p>
                    <p class="text-gray-400">Arrival: {{$registration->bus->arrival_time}}</p>
                    <p class="text-gray-400">Registered on: {{$registration->registration_date}}</p>
                    <p class="text-gray-400">Status: {{$registration->status}}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>