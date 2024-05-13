<?php

namespace App\Livewire;

use Livewire\Component;


class CreateRecipe extends Component
{
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
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }

    public function save()
    {
        dd($this->ingredients);
    }

    public function render()
    {
        return view('livewire.create-recipe');
    }
}
