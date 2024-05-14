<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileUpload extends Component
{
    public bool $multiple;
    public $wiremodel;
    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $multiple,
        $wiremodel
    )
    {
        $this->multiple = $multiple;
        $this->wiremodel = $wiremodel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.file-upload');
    }
}
