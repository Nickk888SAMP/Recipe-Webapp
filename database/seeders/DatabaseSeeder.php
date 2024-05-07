<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Recipe;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Nickk888',
            'email' => 'kevinnickk888@gmail.com'
        ]);
        User::factory(25)->create();
        Recipe::factory(100)->create();

        $recipes = Recipe::all();
        foreach($recipes as $recipe)
        {
            for($i = 0; $i < rand(3, 15); $i++)
            {
                Ingredient::factory()->create([
                    'recipe_id' => $recipe->id,
                    'amount' => rand(1, 1000),
                    'unit' => fake()->randomElement(["g", "EL", "TL", "ml", "Kg", "El, gestr.", "Paket"]),
                    'ingredient' => fake()->word(),
                ]);
            }
        }
    }
}
