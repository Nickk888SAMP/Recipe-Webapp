<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function index()
    {
        return view('dashboard.message.index');
    }
}
