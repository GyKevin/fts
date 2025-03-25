<x-app-layout>
    <div class="flex flex-nowrap justify-center p-4">
        <div class="flex flex-col  p-4 w-1/2 bg-gray-800 rounded-xl">
            <h2 class="font-bold text-white text-2xl">Edit Users</h2>
    <form action="{{route('admin.update.users', $user->id)}}" method="post" class="flex flex-col text-gray-400">
        @csrf
        @method('PUT')
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="{{$user->first_name}}" required>

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="{{$user->last_name}}" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="{{$user->email}}" required>

        <label for="age">Age</label>
        <input type="number" name="age" value="{{$user->age}}">

        <label for="phone">Phone Number</label>
        <input type="text" name="phone" value="{{$user->phone}}">

        <label for="role">Role</label>
        <input type="text" name="role" value="{{$user->role}}" required>

        <label for="student_number">Student Number</label>
        <input type="text" name="student_number" value="{{$user->student_number}}">

        <label for="points">Points</label>
        <input type="number" name="points" value="{{$user->points}}" required>

        <label for="password">Password</label>
        <input type="text" name="password" value="{{$user->password}}" required>

        <input class="bg-gray-600 mt-3 rounded-md h-10 hover:bg-gray-500 hover:text-gray-300 transition-all cursor-pointer" type="submit" value="Submit">
    </form>
    <form action="{{route('admin.delete.users', $user->id)}}" method="post" class="flex flex-col text-red-400">
        @csrf
        @method('DELETE')
        <input class="bg-gray-600 mt-3 rounded-md h-10 hover:bg-gray-500 hover:text-red-300 transition-all cursor-pointer"" type="submit" value="Delete">
    </form>
</x-app-layout>