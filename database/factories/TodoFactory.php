<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'category' => fake()->randomElement(['development', 'testing']),
            'description' => fake()->sentence(),
            'status' => fake()->randomElement(['in_progress', 'completed']),
        ];
    }
}
