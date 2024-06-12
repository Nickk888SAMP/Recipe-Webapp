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
    public ?User $user;
    private bool $preventOpen = false;

    #[Validate('required|numeric|min:1|max:5')]
    public int $selectedRating = 0;
    #[Validate('required|min:1|max:1000')]
    public string $reviewText = "";

    public function mount()
    {
        if($this->user == null)
            return $this->preventOpen = true;
    }

    public function selectRating($rating)
    {
        $this->selectedRating = $rating;
    }

    public function userReviewed(): bool
    {
        return count(Review::where('user_id', '=', $this->user->id)->where('recipe_id', '=', $this->recipe->id)->get()) > 0;
    }

    public function submit()
    {
        if ($this->userReviewed())
        {
            flash()
                ->addError('Das Rezept wurde bereits von diesem Benutzerkonto erstellt.');
            return $this->closeModal();
        }

        $this->validate();

        Review::create([
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id,
            'rating' => $this->selectedRating,
            'review' => $this->reviewText
        ]);
        $this->dispatch('review-created');
        $this->closeModal();
        flash()->addSuccess('Deine Bewertung wurde erfolgreich hinzugefügt.');
    }

    public function render()
    {
        if ($this->preventOpen)
            return;

        return view('livewire.add-review-modal');
    }
}
