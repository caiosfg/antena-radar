<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Satellite>
 */
class SatelliteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->name(),
            'uf' => fake()->name(),
            'avatar' => fake()->name(),
            'location' => fake()->name(),
            'active' => fake()->boolean(),
            'category' => fake()->randomElement(['easy', 'medium', 'hard']),
            'start_date' => fake()->date('Y-m-d'),
            'end_date' => fake()->date('Y-m-d'),
            'height' => fake()->randomDigitNotNull(),
        ];
    }
}
