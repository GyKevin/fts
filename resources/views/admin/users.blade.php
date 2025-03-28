<x-app-layout>
    <div class="flex justify-center p-6">
        <div class="w-full max-w-4xl bg-gray-800 rounded-xl shadow-lg p-6">
            <h2 class="font-bold text-white text-2xl mb-6">Select Users</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Role</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-700 transition duration-150 ease-in-out">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{route('admin.edit.users', $user->id)}}" class="text-blue-400 hover:text-blue-300">{{$user->id}}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{$user->first_name}} {{$user->last_name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{$user->email}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{$user->role}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>