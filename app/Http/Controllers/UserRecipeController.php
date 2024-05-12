<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRecipeController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.recipe.index');
    }

    public function create(Request $request)
    {
        return view('dashboard.recipe.create');
    }

    public function recipeAdd(Request $request)
    {
        dd($request->all());
        return view('dashboard.recipe.create');
    }
}
