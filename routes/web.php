<?php

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TagCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\UserRecipeController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\UserFavoriteController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;


// Home
Route::get('/', function () {
    $recipesHighestRated = Recipe::highestRated()->limit(10)->get();
    $categories = Category::all();
    return view('home.index', [
        'recipesHighestRated' => $recipesHighestRated,
        'categories' => $categories,
    ]);
})->name('home.index');

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('auth.login.index');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login.login');

Route::get('/register', [RegisterController::class, 'index'])->name('auth.register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register.register');

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Show Recipe
Route::resource("recipe", RecipeController::class)->only('show');

// Search Recipe
Route::get("/search", function (Request $request) {
    $tagCategories = TagCategory::all();
    $tags = $request->input('tags');
    $recipes = Recipe::simplePaginate(5);
    if($tags != null)
    {
        $tags = str_replace('+', ' ', $tags);
        $tags = explode('%', $tags);
        $tags = Tag::where(function ($query) use($tags)  {
            foreach($tags as $item)
            {
                $query->orWhere('name', 'LIKE', $item . '%');
            }
        })->get();
        $tagIds = $tags->pluck('id')->unique()->toArray();
        $requiredTagCount = count($tagIds);
        $recipes = Recipe::whereHas('tags', function ($query) use ($tagIds, $requiredTagCount) {
            $query->whereIn('tag_id', $tagIds)
                ->groupBy('recipe_id')
                ->havingRaw('COUNT(DISTINCT tag_id) = ?', [$requiredTagCount]);
        })->simplePaginate(5);
    } 
    else 
    {
        $tags = array();
    }
    return view('recipe.search', [
        'tags' => $tags, 
        'recipes' => $recipes,
        'tag_categories' => $tagCategories
    ]);
})->name('recipe.search');

// Show User
Route::resource("user", UserController::class)->only('show');

// Dashboard
Route::controller(ProfileController::class)->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/profile', 'edit')->name('dashboard.edit');
    Route::put('/update-profile', 'updateProfile')->name('dashboard.update.profile');
    Route::put('/update-profile-password', 'updatePassword')->name('dashboard.update.password');
});

Route::controller(UserRecipeController::class)->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/recipees', 'index')->name('dashboard.recipees');
    Route::get('/recipees/create', 'create')->name('dashboard.recipees.create');
    Route::post('/recipees/create', 'recipeAdd')->name('dashboard.recipees.create.add');
});

Route::controller(UserReviewController::class)->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/reviews', 'index')->name('dashboard.reviews');
});

Route::controller(UserMessageController::class)->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/messages', 'index')->name('dashboard.messages');
});

Route::controller(UserFavoriteController::class)->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/favorites', 'index')->name('dashboard.favorites');
});

// Admin Dashboard
Route::controller(AdminController::class)->prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard');
    // Route::get('/measurementunits', 'index')->name('admin.dashboard');
});

// Fallback
Route::fallback(function () {
    return view('404');
});
