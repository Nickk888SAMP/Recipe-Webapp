<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Recipe;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'displayname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar()
    {
        if(!$this->avatar)
        {
            return asset('img/avatar_default.png');
        }
        return asset($this->avatar);
    }

    public function recipes(): hasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function favoriteRecipesOrdered()
    {
        return $this->favoriteRecipes()
            ->orderBy('favorites.updated_at', 'desc')
            ->get();
    }

    public function favoriteRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'favorites', 'user_id', 'recipe_id')
            ->where('favorites.isliking', true);
    }
}
