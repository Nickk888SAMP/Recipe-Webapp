<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return redirect()->route('home.index');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            toastr()->success('Angemeldet');
            return redirect()->route('home.index');
        }

        toastr()->error('Falsche anmeldedaten. Bitte versuchen Sie es erneut.');
        return redirect()->back();
    }

    public function logout(LogoutRequest $request)
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        session()->flush();

        return redirect()->route('home.index');
    }
}