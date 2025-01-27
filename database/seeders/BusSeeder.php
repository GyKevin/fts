<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bus::create([
            'bus_number' => 'BUS001',
            'festival_id' => 1,
            'driver_id' => 1,
            'date' => '2025-01-27',
            'location' => 'Rotterdam',
            'departure_time' => '2025-01-27 09:00:00',
            'arrival_time' => '2025-01-27 12:00:00',
            'total_seats' => 50,
            'available_seats' => 50,
            'price' => 15.50,
        ]);

        Bus::create([
            'bus_number' => 'BUS002',
            'festival_id' => 1,
            'driver_id' => 2,
            'date' => '2025-01-28',
            'location' => 'Amsterdam',
            'departure_time' => '2025-01-28 10:00:00',
            'arrival_time' => '2025-01-28 13:00:00',
            'total_seats' => 60,
            'available_seats' => 60,
            'price' => 20.00,
        ]);
    }
}
