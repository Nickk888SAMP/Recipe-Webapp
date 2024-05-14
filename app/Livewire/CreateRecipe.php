<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\CreateRecipeForm;
use App\Models\Recipe;


class CreateRecipe extends Component
{
    public CreateRecipeForm $form;
    public $ingredients;

    public function mount()
    {
        $this->ingredients = array(['amount' => 0, 'unit' => 4, 'ingredient' => '']);
    }

    public function addIngredient()
    {
        $newIngredient = ['amount' => 0, 'unit' => 4, 'ingredient' => ''];
        array_push($this->ingredients, $newIngredient);
    }

    public function removeIngredient($index)
    {
        if(count($this->ingredients) == 1)
            return;

        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
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

        foreach($ingredients as $ingredient)
        {
            Ingredient::create([
                'recipe_id' => $recipe->id,
                'amount' => $ingredient->amount,
                'unit' => $ingredient->unit,
                'ingredient' => $ingredient->ingredient
            ]);
        }
    }

    public function render()
    {
        return view('livewire.create-recipe');
    }
}
