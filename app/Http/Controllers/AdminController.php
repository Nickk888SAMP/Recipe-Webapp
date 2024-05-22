<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::all()->count();
        $recipeeCount = Recipe::all()->count();
        return view('admin.dashboard.index', [
            'recipesCount' => $recipeeCount,
            'usersCount' => $usersCount,
        ]);
    }
}
