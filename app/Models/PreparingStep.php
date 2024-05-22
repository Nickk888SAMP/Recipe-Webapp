<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PreparingStep extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'step_number', 'preparing_text'];
    
    public function recipe(): HasOne
    {
        return $this->hasOne(Recipe::Class);
    }
}
