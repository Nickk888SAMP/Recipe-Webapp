<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Recipe;
use App\Models\User;

class RecipeCard extends Component
{
    public Recipe $recipe;
    public ?User $user;
    public int $number;
    /**
     * Create a new component instance.
     */
    public function __construct(
        Recipe $recipe,
        ?User $user,
        int $number = 0
    )
    {
        $this->recipe = $recipe;
        $this->user = $user;
        $this->number = $number;
    }

    public function placeholder(array $params = [])
    {
        return view('components.livewire-lazy-placeholder', $params);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recipe-card');
    }
}
