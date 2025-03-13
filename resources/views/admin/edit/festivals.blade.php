<x-app-layout>
    <form action="{{route('admin.update.festivals', $festival->id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="festival_name" value="{{$festival->festival_name}}">
        <input type="text" name="festival_date" value="{{$festival->date}}">
        <input type="text" name="festival_location" value="{{$festival->location}}">
        <input type="text" name="festival_capacity" value="{{$festival->max_participants}}">
        <input type="text" name="festival_description" value="{{$festival->description}}">
        <input type="submit" value="Update">
    </form>
    <form action="{{route('admin.delete.festivals', $festival->id)}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
</x-app-layout>