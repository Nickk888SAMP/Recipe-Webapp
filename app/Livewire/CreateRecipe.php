<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;

class CreateRecipe extends Component
{
    public $ingredients;

    protected $listeners = ['removeIngredient'];


    public function mount()
    {
        $this->ingredients = array(new Ingredient());
    }

    public function addIngredient()
    {
        $newIngredient = new Ingredient();
        // $this->emit('removeIngredient', $newIngredient);
        array_push($this->ingredients, $newIngredient);
    }

    public function removeIngredient($index)
    {
        dd($index);
        unset($index);
    }

    public function save()
    {

    }

    public function render()
    {
        return view('livewire.create-recipe');
    }
}
