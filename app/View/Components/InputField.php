<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public string $name;
    public string $value;
    public string $placeholder;
    public string $type;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name = '',
        string $value = '',
        string $placeholder = '',
        string $type = 'text'
    )
    {
        $this->name =  $name;
        $this->value =  $value;
        $this->placeholder = $placeholder;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
