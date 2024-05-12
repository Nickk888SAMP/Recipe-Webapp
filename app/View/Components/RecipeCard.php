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
    /**
     * Create a new component instance.
     */
    public function __construct(
        Recipe $recipe,
        ?User $user,
    )
    {
        $this->recipe = $recipe;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recipe-card');
    }
}
