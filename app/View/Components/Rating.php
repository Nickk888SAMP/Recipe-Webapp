<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Rating extends Component
{
    public $recipe;

    public function __construct(
        $recipe
    )
    {
        $this->recipe = $recipe;
    }

    public function render(): View|Closure|string
    {
        return view('components.rating');
    }
}
