<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PreparingStep extends Model
{
    use HasFactory;

    public function recipe(): HasOne
    {
        return $this->hasOne(Recipe::Class);
    }
}
