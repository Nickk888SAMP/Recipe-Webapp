<?php

use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $recipes = Recipe::all();
    return view('Home.index', [
        'recipes' => $recipes
    ]);
})->name('home.index');

Route::get('/login', [LoginController::class, 'index'])->name('auth.login.index');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login.login');

Route::get('/register', [RegisterController::class, 'index'])->name('auth.register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register.register');

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::resource("recipe", RecipeController::class);

Route::resource("user", UserController::class);