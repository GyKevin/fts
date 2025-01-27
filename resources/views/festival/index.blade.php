<x-app-layout>
    @foreach ($festivals as $festival)
        <div>
            <a class="text-white" href="{{route('festival.show', $festival)}}">{{$festival->festival_name}}</a>
        </div>
    @endforeach
</x-app-layout>
