<?php

namespace Database\Seeders;

use App\Models\Festival;
use App\Models\User;
use App\Models\Driver;

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
        // user seeder
        User::create([
            'id' => 1,
            'first_name' => 'Anton',
            'last_name'=> 'Dahmer',
            'email'=> 'anton@gmail.com',
            'age' => '22',
            'password' => 'password123',
            'phone' => '0612345678',
            'role'=> 'student',
            'student_number' => '123456',
            'points'=> '0',
        ]);
        User::create([
            'id' => 2,
            'first_name' => 'Admin',
            'last_name'=> 'Admin',
            'email'=> 'admin@fts.com',
            'age' => '22',
            'password' => 'password123',
            'phone' => '0612345678',
            'role'=> 'admin',
            'student_number' => '0',
            'points'=> '100',
        ]);

        // festivals seeder
        Festival::create([
            'festival_name' => 'Summer Music Festival',
            'date' => '2025-07-15',
            'location' => 'Amsterdam',
            'description' => 'Annual summer music event',
            'max_participants' => 200
        ]);

        Festival::create([
            'festival_name' => 'Tomorrowland',
            'date' => '2025-07-18',
            'location' => 'Boom',
            'description' => 'Tomorrowland 2025',
            'max_participants' => 20000
        ]);

        Festival::create([
            'festival_name' => 'Defqon',
            'date' => '2025-06-26',
            'location' => 'Biddinghuizen',
            'description' => 'Defqon 2025',
            'max_participants' => 20000
        ]);

        // busses seeder
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

        Bus::create([
            'bus_number' => 'BUS003',
            'festival_id' => 2,
            // 'driver_id' => 3,
            'date' => '2025-07-18',
            'location' => 'Amsterdam',
            'departure_time' => '2025-07-18 10:00:00',
            'arrival_time' => '2025-07-18 13:00:00',
            'total_seats' => 40,
            'available_seats' => 40,
            'price' => 40.00,
        ]);

        Bus::create([
            'bus_number' => 'BUS004',
            'festival_id' => 3,
            // 'driver_id' => 3,
            'date' => '2025-06-26',
            'location' => 'Rotterdam',
            'departure_time' => '2025-06-26 10:00:00',
            'arrival_time' => '2025-06-26 13:00:00',
            'total_seats' => 50,
            'available_seats' => 50,
            'price' => 30.00,
        ]);

        // drivers seeder
        Driver::create([
            'id' => 1,
            'license_number' => '123456',
            'license_expiry' => '2028-01-01',

        ]);

        Driver::create([
            'id' => 2,
            'license_number' => '2345345',
            'license_expiry' => '2028-01-01',
            
        ]);

        Driver::create([
            'id' => 3,
            'license_number' => '3453454',
            'license_expiry' => '2028-01-01',
            
        ]);
    }
}
