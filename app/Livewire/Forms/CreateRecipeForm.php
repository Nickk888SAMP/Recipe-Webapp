<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateRecipeForm extends Form
{
    public $name;
    public $description;
    public $preparing;
    public $prepTimeHours = 0;
    public $prepTimeMinutes = 0;
    public $prepDifficulty = 0;
    public $images;
    public $servings = 4;
    public $kcalories = 0;
}
