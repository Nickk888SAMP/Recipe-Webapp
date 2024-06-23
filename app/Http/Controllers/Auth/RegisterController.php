<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return redirect()->route('home.index');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'displayname' => $request->display_name,
        ]);
        flash()->addSuccess('Benutzerkonto wurde erfolgreich erstellt.');
        return redirect()->route('home.index');
    }
}
