<x-app-layout>
    <form action="{{route('admin.update.users', $user->id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="first_name" value="{{$user->first_name}}" required>
        <input type="text" name="last_name" value="{{$user->last_name}}" required>
        <input type="email" name="email" value="{{$user->email}}" required>
        <input type="number" name="age" value="{{$user->age}}">
        <input type="text" name="phone" value="{{$user->phone}}">
        <input type="text" name="role" value="{{$user->role}}" required>
        <input type="text" name="student_number" value="{{$user->student_number}}">
        <input type="number" name="points" value="{{$user->points}}" required>
        <input type="text" name="password" value="{{$user->password}}" required>
        <input type="submit" value="Submit">
    </form>
    <form action="{{route('admin.delete.users', $user->id)}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
</x-app-layout>