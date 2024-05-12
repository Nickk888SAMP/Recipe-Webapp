<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{
    public function index()
    {
        return view('dashboard.favorite.index');
    }
}
