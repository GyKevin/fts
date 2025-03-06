<x-app-layout>
@foreach ($festivals as $festival)
    <p>{{$festival->festival_name}}</p>
@endforeach
</x-app-layout>