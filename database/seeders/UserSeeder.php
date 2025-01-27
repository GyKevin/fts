<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
