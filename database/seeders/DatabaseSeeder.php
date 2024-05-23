<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ingredient;
use App\Models\IngredientUnit;
use App\Models\PreparingStep;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Recipe;

class DatabaseSeeder extends Seeder
{
    public $ingredientUnits = array(
        ['Kg', 'Kilogramm'],
        ['L', 'Liter'],
        ['ml', 'Milliliter'],
        ['Pr', 'Prise'],
        ['dl', 'Deziliter'],
        ['El', 'Esslöffel'],
        ['g', 'Gramm'],
        ['st.', 'Stück'],
    );
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'displayname' => 'Nickk888',
            'email' => 'kevinnickk888@gmail.com'
        ]);
        User::factory(25)->create();
        Recipe::factory(100)->create();

        foreach($this->ingredientUnits as $ingredientUnit)
        {
            IngredientUnit::factory()->create([
                'short' => $ingredientUnit[0],
                'long' => $ingredientUnit[1]
            ]);
        }

        // Ingredients
        $recipes = Recipe::all();
        foreach($recipes as $recipe)
        {
            $rand = rand(3, 15);
            for($i = 0; $i < $rand; $i++)
            {
                $unit = IngredientUnit::all()->random();
                Ingredient::factory()->create([
                    'recipe_id' => $recipe->id,
                    'ingredient_unit_id' => $unit->id,
                    'amount' => rand(1, 1000) / $recipe->servings,
                    'ingredient' => fake()->word(),
                    'order' => 0
                ]);
            }
        }

        // Preparing Steps
        foreach($recipes as $recipe)
        {
            $rand = rand(3, 15);
            for($i = 0; $i < $rand; $i++)
            {
                PreparingStep::factory()->create([
                    'recipe_id' => $recipe,
                    'step_number' => $i,
                    'preparing_text' => fake()->sentence()
                ]);
            }
        }
    }
}
