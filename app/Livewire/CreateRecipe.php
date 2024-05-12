<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;

class CreateRecipe extends Component
{
    public $ingredients;

    public function boot()
    {
        $this->ingredients = array(new Ingredient());
    }

    public function addIngredient()
    {
        array_push($this->ingredients, new Ingredient());
    }

    public function save()
    {

    }

    public function render()
    {
        return view('livewire.create-recipe');
    }
}
