<?php

namespace App\Livewire;

use Livewire\Component;

class IngredientsList extends Component
{
    public int $servings = 1;
    public $recipe;

    public function mount()
    {
        $this->servings = $this->recipe->servings;
    }

    public function updatedServings($value)
    {
        $this->servings = max(1, min(999, $value));
    }

    public function increase()
    {
        if($this->servings < 999)
        {
            $this->servings++;
        }
    }

    public function decrease()
    {
        if($this->servings > 1)
        {
            $this->servings--;
        }
    }

    public function render()
    {
        return view('livewire.ingredients-list');
    }
}
