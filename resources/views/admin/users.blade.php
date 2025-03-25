<x-app-layout>
    
                            @foreach ($users as $user)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{route('admin.edit.users', $user->id)}}" class="py-2 px-4 border-b">{{ $user->first_name }} {{ $user->last_name }}</a> 
                                    </td>
                                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                                </tr>
                            @endforeach
</x-app-layout>