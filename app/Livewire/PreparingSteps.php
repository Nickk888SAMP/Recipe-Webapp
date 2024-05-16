<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;

class PreparingSteps extends Component
{
    public Recipe $recipe;

    public function mount(
        Recipe $recipe
    )
    {
        $this->recipe = $recipe;
    }

    public function placeholder(array $params = [])
    {
        return view('components.livewire-lazy-placeholder', $params);
    }

    public function render()
    {
        return view('livewire.preparing-steps');
    }
}
