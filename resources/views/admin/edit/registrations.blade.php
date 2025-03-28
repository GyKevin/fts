<x-app-layout>
    <div class="container mx-auto px-4 py-8">

        @if ($registrations->isEmpty())
            <p class="text-gray-500">No reservations found.</p>
        @else
            <div class="bg-gray-800 rounded-lg shadow overflow-hidden p-6">
                <h1 class="text-2xl font-bold text-white">
                    Bus Reservations for {{ $user->first_name }} {{ $user->last_name }}
                </h1>
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Festival</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Bus</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Departure</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Arrival</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach ($registrations as $registration)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $registration->festival->festival_name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $registration->bus->bus_number ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $registration->bus->departure_time ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $registration->bus->arrival_time ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    <span class="px-2 py-1 rounded-full text-xs 
                                        {{ $registration->status === 'confirmed' ? 'bg-green-500' : 
                                           ($registration->status === 'cancelled' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                        {{ ucfirst($registration->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>