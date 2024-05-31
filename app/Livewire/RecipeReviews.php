<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use Livewire\Attributes\On; 

class RecipeReviews extends Component
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

    #[On('review-created')]
    public function refreshList()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.recipe-reviews');
    }
}
