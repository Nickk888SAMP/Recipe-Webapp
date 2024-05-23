<?php

namespace App\Livewire;

use App\Livewire\Request;
use Livewire\Component;
use App\Livewire\Forms\CreateRecipeForm;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\IngredientUnit;
use App\Models\RecipeImage;
use App\Models\PreparingStep;

use App\Traits\HelpersTrait;
use Livewire\WithFileUploads;
use ImageOptimizer;

class CreateRecipe extends Component
{
    use WithFileUploads, HelpersTrait;

    public CreateRecipeForm $form;
    

    public function mount()
    {
        $this->form->ingredients = array(['amount' => 0, 'unit' => 1, 'ingredient' => '']);
        $this->form->prepSteps = array(null);
    }
    
    public function removeImage($index)
    {
        array_splice($this->form->images, $index, 1);
    }

    public function addPrepStep()
    {
        $newPrepStep = array(null);
        array_push($this->form->prepSteps, $newPrepStep);
    }

    public function removePrepStep($index)
    {
        if(count($this->form->prepSteps) == 1)
            return;

        unset($this->form->prepSteps[$index]);
        $this->form->prepSteps = array_values($this->form->prepSteps);
    }

    public function addIngredient()
    {
        $newIngredient = ['amount' => 0, 'unit' => 0, 'ingredient' => ''];
        array_push($this->form->ingredients, $newIngredient);
    }

    public function removeIngredient($index)
    {
        if(count($this->form->ingredients) == 1)
            return;

        unset($this->form->ingredients[$index]);
        $this->form->ingredients = array_values($this->form->ingredients);
    }

    public function updateIngredientsOrder($list)
    {
        $newArray = array();
        foreach($list as $key => $value)
        {
            array_push($newArray, $this->form->ingredients[ $value['value'] ]);
        }
        $this->form->ingredients = $newArray;
    }

    public function updatePrepStepsOrder($list)
    {
        $newArray = array();
        foreach($list as $key => $value)
        {
            array_push($newArray, $this->form->prepSteps[ $value['value'] ]);
        }
        $this->form->prepSteps = $newArray;
    }

    public function save()
    {
        // dd($request);

        //Recipe
        $recipe = Recipe::create([
            'name' => $this->form->name,
            'description' => $this->form->description,
            'servings' => $this->form->servings,
            'preptime' => ($this->form->prepTimeHours * 60) + ($this->form->prepTimeMinutes),
            'difficulty' => $this->form->prepDifficulty,
            'kcalories' => $this->form->kcalories,
            'user_id' => auth()->user()->id
        ]);

        // Ingredients
        foreach($this->form->ingredients as $index => $ingredient)
        {
            $unit = IngredientUnit::findOrFail($ingredient['unit']);
            Ingredient::create([
                'recipe_id' => $recipe->id,
                'amount' => ($ingredient['amount'] / $this->form->servings),
                'ingredient_unit_id' => $unit->id,
                'ingredient' => $ingredient['ingredient'],
                'order' => $index
            ]);
        }

        // Prep Steps
        foreach($this->form->prepSteps as $index => $prepStep)
        {
            PreparingStep::create([
                'recipe_id' => $recipe->id,
                'step_number' => $index,
                'preparing_text' => $prepStep
            ]);
        }

        // Images
        foreach($this->form->images as $image)
        {
            $imageName = $this->generateFilename() . "." . $image->extension();
            $image->storeAs('uploads/recipees', $imageName);
            $path = "storage/uploads/recipees/" . $imageName;
            ImageOptimizer::optimize($path);
            RecipeImage::create([
                'user_id' => auth()->user()->id,
                'recipe_id' => $recipe->id,
                'image_path' => $path
            ]);
        }
    }

    public function render()
    {
        return view('livewire.create-recipe', [
            'ingredientUnits' => IngredientUnit::all()
        ]);
    }
}
