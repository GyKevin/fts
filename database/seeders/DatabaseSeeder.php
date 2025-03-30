<?php

namespace Database\Seeders;

use App\Models\Festival;
use App\Models\User;
use App\Models\Driver;
use App\Models\Bus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        User::truncate();
        Festival::truncate();
        Driver::truncate();
        Bus::truncate();

        // Users (Admin + 20 Students)
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'System',
            'email' => 'admin@fts.com',
            'age' => 35,
            'password' => Hash::make('admin123'),
            'phone' => '0612345678',
            'role' => 'admin',
            'student_number' => 'ADM001',
            'points' => 1000,
        ]);

        $studentNames = [
            ['Emma', 'Johnson'], ['Liam', 'Smith'], ['Olivia', 'Williams'],
            ['Noah', 'Brown'], ['Ava', 'Jones'], ['William', 'Garcia'],
            ['Sophia', 'Miller'], ['Benjamin', 'Davis'], ['Isabella', 'Rodriguez'],
            ['James', 'Martinez'], ['Mia', 'Hernandez'], ['Elijah', 'Lopez'],
            ['Charlotte', 'Gonzalez'], ['Lucas', 'Wilson'], ['Amelia', 'Anderson'],
            ['Mason', 'Thomas'], ['Harper', 'Taylor'], ['Ethan', 'Moore'],
            ['Evelyn', 'Jackson'], ['Alexander', 'Martin']
        ];

        foreach ($studentNames as $i => $name) {
            User::create([
                'first_name' => $name[0],
                'last_name' => $name[1],
                'email' => strtolower($name[0]).'@student.com',
                'age' => rand(18, 25),
                'password' => Hash::make('student123'),
                'phone' => '06'.rand(10000000, 99999999),
                'role' => 'student',
                'student_number' => 'STD'.str_pad($i+1, 3, '0', STR_PAD_LEFT),
                'points' => rand(10, 200),
            ]);
        }

        // Festivals (8 Major European Festivals)
        $festivals = [
            [
                'festival_name' => 'Tomorrowland',
                'date' => '2025-07-18',
                'location' => 'Boom, Belgium',
                'description' => 'The world\'s largest electronic music festival with spectacular stages and atmosphere.',
                'max_participants' => 60000
            ],
            [
                'festival_name' => 'Defqon.1',
                'date' => '2025-06-26',
                'location' => 'Biddinghuizen, Netherlands',
                'description' => 'Weekend Festival dedicated to hardstyle music with massive sound systems and lightshows.',
                'max_participants' => 50000
            ],
            [
                'festival_name' => 'Sziget',
                'date' => '2025-08-07',
                'location' => 'Budapest, Hungary',
                'description' => 'Week-long festival of music and culture on an island in the Danube with diverse lineup.',
                'max_participants' => 90000
            ],
            [
                'festival_name' => 'Untold',
                'date' => '2025-08-05',
                'location' => 'Cluj-Napoca, Romania',
                'description' => 'Romania\'s biggest electronic music festival with top EDM artists.',
                'max_participants' => 50000
            ],
            [
                'festival_name' => 'Mysteryland',
                'date' => '2025-08-27',
                'location' => 'Haarlemmermeer, Netherlands',
                'description' => 'One of the longest-running electronic music festivals in the Netherlands.',
                'max_participants' => 60000
            ],
            [
                'festival_name' => 'Exit',
                'date' => '2025-07-08',
                'location' => 'Novi Sad, Serbia',
                'description' => 'Award-winning festival held in a historic fortress with multiple music stages.',
                'max_participants' => 50000
            ],
            [
                'festival_name' => 'Ultra Europe',
                'date' => '2025-07-10',
                'location' => 'Split, Croatia',
                'description' => 'Croatian edition of the famous Ultra electronic music festival series.',
                'max_participants' => 100000
            ],
            [
                'festival_name' => 'Parookaville',
                'date' => '2025-07-22',
                'location' => 'Weeze, Germany',
                'description' => 'German electronic music festival with a fantasy city theme.',
                'max_participants' => 80000
            ],
        ];

        foreach ($festivals as $festival) {
            Festival::create($festival);
        }

        // Drivers (15 Professional Drivers)
        $driverNames = [
            ['Jan', 'de Vries'], ['Piet', 'van Dijk'], ['Klaas', 'Bakker'],
            ['Mohamed', 'Ali'], ['Anna', 'Kowalski'], ['Hans', 'Müller'],
            ['Erik', 'Andersen'], ['Maria', 'Garcia'], ['John', 'Smith'],
            ['Fatima', 'Ahmed'], ['Lars', 'Johansson'], ['Sophie', 'Dubois'],
            ['Marko', 'Petrovic'], ['Elena', 'Ivanova'], ['David', 'Wilson']
        ];

        foreach ($driverNames as $i => $name) {
            Driver::create([
                'first_name' => $name[0],
                'last_name' => $name[1],
                'license_number' => 'DRV'.str_pad($i+1, 3, '0', STR_PAD_LEFT),
                'license_expiry' => Carbon::now()->addYears(rand(1, 5))->format('Y-m-d'),
            ]);
        }

        // Buses (40 Buses Across All Festivals)
        $busData = [];
        $busNumber = 1;
        
        foreach (Festival::all() as $festival) {
            $departureCities = ['Amsterdam', 'Rotterdam', 'Utrecht', 'Eindhoven', 'Groningen', 'Maastricht'];
            
            // Create 3-7 buses per festival
            $busCount = rand(3, 7);
            
            for ($i = 0; $i < $busCount; $i++) {
                $totalSeats = rand(40, 60);
                $availableSeats = rand(5, $totalSeats); // Some buses nearly full
                $registered = $totalSeats - $availableSeats;
                
                $busData[] = [
                    'bus_number' => 'BUS'.str_pad($busNumber++, 3, '0', STR_PAD_LEFT),
                    'festival_id' => $festival->id,
                    'driver_id' => rand(1, 15), // Random driver
                    'date' => $festival->date,
                    'location' => $departureCities[array_rand($departureCities)],
                    'departure_time' => sprintf('%02d:00:00', rand(6, 12)), // Between 6AM-12PM
                    'arrival_time' => sprintf('%02d:00:00', rand(13, 18)), // Between 1PM-6PM
                    'total_seats' => $totalSeats,
                    'available_seats' => $availableSeats,
                    'price' => rand(1500, 4000) / 100, // €15.00 - €40.00
                    'status' => $registered >= 35 ? 'confirmed' : 'not confirmed'
                ];
            }
        }

        foreach ($busData as $bus) {
            Bus::create([
                'bus_number' => $bus['bus_number'],
                'festival_id' => $bus['festival_id'],
                'driver_id' => $bus['driver_id'],
                'date' => $bus['date'],
                'location' => $bus['location'],
                'departure_time' => $bus['date'].' '.$bus['departure_time'],
                'arrival_time' => $bus['date'].' '.$bus['arrival_time'],
                'total_seats' => $bus['total_seats'],
                'available_seats' => $bus['available_seats'],
                'price' => $bus['price'],
                'status' => $bus['status']
            ]);
        }
    }
}