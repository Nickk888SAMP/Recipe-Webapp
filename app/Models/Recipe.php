<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Ingredient;
use App\Models\RecipeImage;
use App\Models\Review;
use App\Models\User;

class Recipe extends Model
{
    use HasFactory;

    public function getPrepTime(bool $shorter = false)
    {
        $minutes=$this->preptime;
        $hours = intdiv($minutes, 60);
        $minutes = ($minutes % 60);
        if($shorter)
        {
            return $hours >= 1 ? $hours . " Std. " . $minutes . " Min." : $minutes . " Min.";
        }
        return $hours >= 1 ? $hours . " Stunde(n) " . $minutes . " Minute(n)" : $minutes . " Minute(n)";
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(RecipeImage::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function avgReviewRating()
    {
        return number_format($this->reviews()->avg('rating'), 1);
    }


}
