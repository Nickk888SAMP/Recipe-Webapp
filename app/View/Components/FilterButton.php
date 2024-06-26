<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterButton extends Component
{
    public string $icon;
    public string $name;
    /**
     * Create a new component instance.
     */
    public function __construct(string $icon, string $name)
    {
        $this->icon = $icon;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-button');
    }
}
