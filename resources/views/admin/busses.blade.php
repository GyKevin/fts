<x-app-layout>
@foreach ($busses as $bus)
    <a href="{{route('admin.edit.busses', $bus->id)}}">{{$bus->bus_number}}</a>
@endforeach
</x-app-layout>