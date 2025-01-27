<?php

namespace Database\Seeders;

use App\Models\Festival;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Festival::create([
            'festival_name' => 'Summer Music Festival',
            'date' => '2024-07-15',
            'location' => 'Amsterdam',
            'description' => 'Annual summer music event',
            'max_participants' => 200
        ]);
    }
}
