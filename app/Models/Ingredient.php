<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'amount', 'unit', 'ingredient', 'order', 'ingredient_unit_id']; 

    public function unit(): BelongsTo
    {
        return $this->belongsTo(IngredientUnit::class, 'ingredient_unit_id');
    }
   
}
