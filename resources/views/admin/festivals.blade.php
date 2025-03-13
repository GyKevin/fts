<x-app-layout>
@foreach ($festivals as $festival)
    <a href="{{route('admin.edit.festivals', $festival->id)}}">{{$festival->festival_name}}</a>
@endforeach
</x-app-layout>