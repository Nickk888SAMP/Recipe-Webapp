<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use Livewire\Attributes\On; 

class RecipeRating extends Component
{
    public Recipe $recipe;

    public function mount(
        Recipe $recipe
    )
    {
        $this->recipe = $recipe;
    }

    #[On('review-created')]
    public function refreshList()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.recipe-rating');
    }
}
