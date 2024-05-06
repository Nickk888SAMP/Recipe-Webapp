<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randUser = User::all()->random();
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'servings' => rand(2, 8),
            'kcalories' => rand(100, 3500),
            'preptime' => rand(10, 120),
            'difficulty' => fake()->randomElement(['simple', 'medium', 'hard']),
            'user_id' => $randUser->id
        ];
    }
}
