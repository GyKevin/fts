<x-app-layout>
    <h1>{{ $festival->festival_name }}</h1>
    <p>Date: {{ $festival->date }}</p>
    <p>Location: {{ $festival->location }}</p>
    <p>Description: {{ $festival->description }}</p>
    <!-- Add more details as needed -->
</x-app-layout>