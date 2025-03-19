<x-app-layout>
    <table>
        <thead>
            <tr>
                <th>License Number</th>
                <th>License Expiry</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <td><a href="{{route('admin.edit.drivers', $driver->id)}}">{{$driver->id}}</a></td>
                    <td>{{$driver->license_number}}</td>
                    <td>{{$driver->license_expiry}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>