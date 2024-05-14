<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\CreateRecipeForm;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\IngredientUnit;
use App\Models\RecipeImage;
use App\Traits\HelpersTrait;
use Livewire\WithFileUploads;

class CreateRecipe extends Component
{
    use WithFileUploads, HelpersTrait;

    public CreateRecipeForm $form;
    public $ingredients;
    

    public function mount()
    {
        $this->ingredients = array(['amount' => 0, 'unit' => 1, 'ingredient' => '']);
    }

    public function addIngredient()
    {
        $newIngredient = ['amount' => 0, 'unit' => 0, 'ingredient' => ''];
        array_push($this->ingredients, $newIngredient);
    }

    public function removeImage($index)
    {
        array_splice($this->form->images, $index, 1);
    }

    public function removeIngredient($index)
    {
        if(count($this->ingredients) == 1)
            return;

        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }

    public function updateOrder($list)
    {
        $newArray = array();
        foreach($list as $key => $value)
        {
            array_push($newArray, $this->ingredients[ $value['value'] ]);
        }
        $this->ingredients = $newArray;
    }

    public function save()
    {
        $recipe = Recipe::create([
            'name' => $this->form->name,
            'description' => $this->form->description,
            'servings' => $this->form->servings,
            'preptime' => ($this->form->prepTimeHours * 60) + ($this->form->prepTimeMinutes),
            'difficulty' => $this->form->prepDifficulty,
            'kcalories' => $this->form->kcalories,
            'preparing' => $this->form->preparing,
            'user_id' => auth()->user()->id
        ]);

        foreach($this->ingredients as $index => $ingredient)
        {
            $unit = IngredientUnit::findOrFail($ingredient['unit']);
            Ingredient::create([
                'recipe_id' => $recipe->id,
                'amount' => ($ingredient['amount'] / $this->form->servings),
                'ingredient_unit_id' => $unit->id,
                'ingredient' => $ingredient['ingredient'],
                'order' => $index
            ]);
        }

        foreach($this->form->images as $image)
        {
            $imageName = $this->generateFilename() . "." . $image->extension();
            $image->storeAs('uploads/recipees', $imageName);
            $path = "storage/uploads/recipees/" . $imageName;
            RecipeImage::create([
                'user_id' => auth()->user()->id,
                'recipe_id' => $recipe->id,
                'image_path' => $path
            ]);
        }
    }

    public function render()
    {
        return view('livewire.create-recipe', [
            'ingredientUnits' => IngredientUnit::all()
        ]);
    }
}
