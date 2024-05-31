<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\Validate;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Review;

class AddReviewModal extends ModalComponent
{
    public Recipe $recipe;
    public User $user;

    #[Validate('required|numeric|min:1|max:5')]
    public int $selectedRating = 0;
    #[Validate('required|min:1|max:255')]
    public string $reviewText = "";

    public function selectRating($rating)
    {
        $this->selectedRating = $rating;
    }

    public function submit()
    {
        $this->validate();
        $this->closeModal();
        Review::create([
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id,
            'rating' => $this->selectedRating,
            'review' => $this->reviewText
        ]);
        $this->dispatch('review-created');
    }

    public function render()
    {
        return view('livewire.add-review-modal');
    }
}
