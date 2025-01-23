<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festival>
 */
class FestivalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->randomNumber(),
            'festival_name' => fake()->sentence(3),
            'date' => fake()->date(),
            'location' => fake()->city(),
            'description' => fake()->realText('2000'),
            'max_participants' => fake()->numberBetween(700, 1000),
            'registration_deadline' => fake()->date(),
        ];
    }
}
