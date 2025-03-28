<x-app-layout>
    <div class="flex flex-nowrap justify-center p-4">
        <div class="flex flex-col p-4 w-5/6 md:w-1/2 bg-gray-800 rounded-xl">
            <h2 class="font-bold text-white text-2xl">Add Users</h2>
                <form action="{{route("admin.store.users")}}" method="POST" class="flex flex-col text-gray-400">
                    @csrf

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" value="{{old('first_name')}}" required>

                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" value="{{old('last_name')}}" required>

                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" required>

                    <label for="age">Age</label>
                    <input type="number" name="age" value="{{old('age')}}">

                    <label for="password">Password</label>
                    <input type="password" name="password" value="{{old('password')}}" required>

                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" value="{{old('phone')}}">

                    <label for="role">Role</label>
                    <input type="text" name="role" value="{{old('role')}}" required>

                    <label for="student_number">Student Number</label>
                    <input type="text" name="student_number" value="{{old('student_number')}}">

                    <label for="points">Points</label>
                    <input type="number" name="points" required value="{{old('points')}}">

                    <input class="bg-gray-600 mt-6 rounded-md h-10 hover:bg-gray-500 hover:text-gray-300 transition-all" type="submit" value="Submit">
                </form>
        </div>
    </div>
</x-app-layout>