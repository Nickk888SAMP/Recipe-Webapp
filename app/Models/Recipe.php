<?php

namespace App\Models;

use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Ingredient;
use App\Models\RecipeImage;
use App\Models\Review;
use App\Models\User;
use App\Models\PreparingStep;

class Recipe extends Model
{
    use HasFactory, WithPagination, WithoutUrlPagination;

    protected $fillable = [
        'name',
        'description',
        'servings',
        'kcalories',
        'preptime',
        'difficulty',
        'user_id'
    ];

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

    public function difficulty()
    {
        return $this->numToDifficulty($this->difficulty);
    }

    public static function numToDifficulty($num)
    {
        switch($num)
        {
            case 0: return "Einfach";
            case 1: return "Mittel";
            case 2: return "Anspruchsvoll";
        }
        return "Fehler";
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class)->orderBy('order', 'asc');
    }

    public function preparingSteps(): HasMany
    {
        return $this->hasMany(PreparingStep::class)->orderBy('step_number', 'asc');
    }

    public function images(): HasMany
    {
        return $this->hasMany(RecipeImage::class);
    }

    public function imagesNormalized()
    {
        $imagesList = array();
        if(count($this->images))
        {
            foreach($this->images as $image)
            {
                array_push($imagesList, asset($image->image_path));
            }
            return $imagesList;
        }
        array_push($imagesList, asset('img/stockfood-2.jpg'));
        return $imagesList;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->orderByDesc("created_at");
    }

    public function avgReviewRating()
    {
        return number_format($this->reviews()->avg('rating'), 1);
    }

    public function scopeName(Builder $query, string $name): Builder 
    {
        return $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopePopular(Builder $query): Builder 
    {
        return $query->withCount('reviews')->orderBy('reviews_count', 'desc');
    }

    public function scopeHighestRated(Builder $query): Builder 
    {
        return $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
    }


}
