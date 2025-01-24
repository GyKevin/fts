<x-layout>
    @foreach ($festivals as $festival)
        <div>
            <a href="{{route('festival.show', $festival)}}">{{$festival->festival_name}}</a>
        </div>
    @endforeach
</x-layout>
