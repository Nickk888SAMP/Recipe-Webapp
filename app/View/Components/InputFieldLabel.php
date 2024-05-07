<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputFieldLabel extends Component
{
    public string $text;
    public string $for;
    
    public function __construct(
        string $text,
        string $for,
    )
    {
        $this->text = $text;
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field-label');
    }
}
