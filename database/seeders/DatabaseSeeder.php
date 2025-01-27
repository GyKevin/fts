<?php

namespace Database\Seeders;

use App\Models\Festival;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'first_name' => 'Kevin',
            'last_name'=> 'Gyori',
            'email'=> 'kevin@gmail.com',
            'age' => '22',
            'password' => 'password123',
            'phone' => '0612345678',
            'role'=> 'student',
            'student_number' => '123456',
            'points'=> '0',
        ]);

        Festival::create([
            'festival_name' => 'Summer Music Festival',
            'date' => '2024-07-15',
            'location' => 'Amsterdam',
            'description' => 'Annual summer music event',
            'max_participants' => 200
        ]);

        Bus::create([
            'bus_number' => 'BUS001',
            'festival_id' => 1,
            // 'driver_id' => 1,
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
            // 'driver_id' => 2,
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
