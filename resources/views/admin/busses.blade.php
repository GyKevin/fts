<x-app-layout>
@foreach ($busses as $bus)
    <p>{{$bus->bus_number}}</p>
@endforeach
</x-app-layout>