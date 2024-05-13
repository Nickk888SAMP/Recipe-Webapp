<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Favorite;

use Livewire\Attributes\On; 


class FavoriteRecipeButton extends Component
{
    public Recipe $recipe;
    public ?User $user = null;
    public ?Favorite $userfavorite = null;
    public bool $isFavorite = false;

    public function boot()
    {
        if ($this->user == null || !Auth()->check())
            return;

        $this->getFavoriteEntry();
        $this->checkFavorite();
    }

    public function toggle()
    {
        if (!Auth()->check())
            return redirect()->route('auth.login.index');

        if ($this->user == null)
            return;

        if(!$this->userfavorite)
        {
            Favorite::create([
                'user_id' => $this->user->id,
                'recipe_id' => $this->recipe->id,
                ])->get();
            $this->getFavoriteEntry();
        }
        else
        {
            $this->userfavorite->isliking = !$this->userfavorite->isliking;
            $this->userfavorite->save();
        }

        $this->dispatch('post-created'); 

        // $this->checkFavorite();
        if($this->isFavorite)
        {
           
        }
        else
        {
            
        }
    }

    private function getFavoriteEntry()
    {
        $this->userfavorite = Favorite::where([
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id
            ])->first();
    }

    
    private function checkFavorite()
    {
        $this->isFavorite = ($this->userfavorite != null && $this->userfavorite->isliking);
    }

    #[On('post-created')] 
    public function render()
    {
        $this->checkFavorite();
        return view('livewire.favorite-recipe-button');
    }
}
