<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateRecipeForm extends Form
{

    #[Validate('required|min:3|max:64')] 
    public $name;
    #[Validate('max:255')] 
    public $description;
    #[Validate('numeric|min:0|max:999')] 
    public $prepTimeHours = 0;
    #[Validate('numeric|min:0|max:60')] 
    public $prepTimeMinutes = 0;
    #[Validate('numeric|min:0|max:2')] 
    public $prepDifficulty = 0;
    #[Validate('required')] 
    public $images;
    #[Validate('required|numeric|min:1|max:999')] 
    public $servings = 4;
    #[Validate('required|numeric|min:0|max:9999')] 
    public $kcalories = 0;
    public $preparing;
    #[Validate('required|array|min:2')]
    public $ingredients;
    #[Validate('required|array|min:2')]
    public $prepSteps;
}
