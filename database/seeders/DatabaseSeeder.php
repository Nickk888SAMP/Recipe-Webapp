<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ingredient;
use App\Models\IngredientUnit;
use App\Models\PreparingStep;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\TagCategory;
use App\Models\Category;
use App\Models\RecipeTag;

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
        ['Pck.', 'Packungen'],
        ['n. B.', 'nach Bedarf'],
    );

    public $tagCategories = array(
        ['Ernährung', '#'],
        ['Rezeptkategorie', '#'],
        ['Rezepteigenschaften', '#'],
        ['Zubereitung', '#'],
        ['Länderküche', '#'],
        ['Mahlzeit', '#'],
        ['Anlass', '#']
    );

    public $tags = array(
        ['Vegetarisch', 1],
        ['Vegan', 1],
        ['Kalorienarm', 1],
        ['Low Carb', 1],
        ['Ketogen', 1],
        ['Paleo', 1],
        ['Fettarm', 1],
        ['Trennkost', 1],
        ['Vollwert', 1],
        ['Für das Baby', 1],

        ['Auflauf', 2],
        ['Pizza', 2],
        ['Reis- oder Nudelsalat', 2],
        ['Salat', 2],
        ['Salatdressing', 2],
        ['Tarte', 2],
        ['Fingerfood', 2],
        ['Dips', 2],
        ['Saucen', 2],
        ['Suppe', 2],
        ['Klöße', 2],
        ['Brot und Brötchen', 2],
        ['Brotspeise', 2],
        ['Aufstrich', 2],
        ['Süßspeise', 2],
        ['Eis', 2],
        ['Kuchen', 2],
        ['Kekse', 2],
        ['Torte', 2],
        ['Confiserie', 2],
        ['Getränke', 2],
        ['Shake', 2],
        ['Gewürzmischung', 2],
        ['Pasten', 2],
        ['Studentenküche', 2],

        ['Einfach', 3],
        ['Schnell', 3],
        ['Basisrezepte', 3],
        ['Preiswert', 3],

        ['Kochen', 4],
        ['Braten', 4],
        ['Dünsten', 4],
        ['Blanchieren', 4],
        ['Schmoren', 4],
        ['Backen', 4],
        ['Überbacken', 4],
        ['Wok', 4],
        ['Mikrowelle', 4],
        ['Römertopf', 4],
        ['Fondue', 4],
        ['Marinieren', 4],
        ['Frittieren', 4],
        ['Flambieren', 4],
        ['Haltbarmachen', 4],
        ['Wursten', 4],

        ['Deutsch', 5],
        ['Italienisch', 5],
        ['Spanisch', 5],
        ['Portugiesisch', 5],
        ['Französisch', 5],
        ['Englisch', 5],
        ['Osteuropäisch', 5],
        ['Skandinavisch', 5],
        ['Griechisch', 5],
        ['Türkisch', 5],
        ['Russisch', 5],
        ['Naher Osten', 5],
        ['Asiatisch', 5],
        ['Indisch', 5],
        ['Japanisch', 5],
        ['Amerikanisch', 5],
        ['Mexikanisch', 5],
        ['Karibisch', 5],
        ['Lateinamerikanisch', 5],
        ['Afrikanisch', 5],
        ['Marokkanisch', 5],
        ['Ägyptisch', 5],
        ['Australisch', 5],

        ['Hauptspeise', 6],
        ['Vorspeise', 6],
        ['Beilage', 6],
        ['Dessert', 6],
        ['Snack', 6],
        ['Frühstück', 6],

        ['Frühling', 7],
        ['Sommer', 7],
        ['Herbst', 7],
        ['Winter', 7],
        ['Für Kinder', 7],
        ['Ostern', 7],
        ['Halloween', 7],
        ['Weihnachten', 7],
        ['Silvester', 7],
        ['Grillen', 7],
        ['Camping', 7],
        ['Party', 7],
    );

    public $categories = array(
        'Pizza', 'Auflauf', 'Reis- oder Nudelsalat', 'Fingerfood', 'Suppe', 'Kuchen', 'Burger', 'Brot und Brötchen' 
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
        $recipes = Recipe::factory(100)->create();
        // $recipes = Recipe::all();

        // Ingredient units
        foreach($this->ingredientUnits as $ingredientUnit)
        {
            IngredientUnit::factory()->create([
                'short' => $ingredientUnit[0],
                'long' => $ingredientUnit[1]
            ]);
        }

        // Tag Categories
        foreach($this->tagCategories as $tagCategory)
        {
            TagCategory::factory()->create([
                'name' => $tagCategory[0],
                'icon' => $tagCategory[1]
            ]);
        }

        // Tags
        foreach($this->tags as $tag)
        {
            Tag::factory()->create([
                'name' => $tag[0],
                'tag_category_id' => $tag[1]
            ]);
        }

        // Categories
        foreach($this->categories as $category)
        {
            Category::factory()->create([
                'name' => $category,
                'image_path' => asset('img/stockfood-2.jpg')
            ]);
        }

        // Ingredients
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
            $randPrepSteps = rand(3, 15);
            $randTags = rand(3, 15);
            for($i = 0; $i < $randPrepSteps; $i++)
            {
                PreparingStep::factory()->create([
                    'recipe_id' => $recipe,
                    'step_number' => $i,
                    'preparing_text' => fake()->sentence()
                ]);
            }
            for($i = 0; $i < $randTags; $i++)
            {
                $tag = Tag::all()->random();
                RecipeTag::factory()->create([
                    'recipe_id' => $recipe,
                    'tag_id' => $tag
                ]);
            }
        }
    }
}
