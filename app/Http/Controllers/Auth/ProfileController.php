<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Traits\HelpersTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Spatie\ImageOptimizer\OptimizerChainFactory;



class ProfileController extends Controller
{
    use HelpersTrait;

    public function edit(Request $request)
    {
        $user = Auth::user();
        return view('dashboard.profile.index', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'displayname' => ['required', 'min:3', 'max:24', 'unique:users,displayname,' . $user->id],
            'description' => ['max:255'],
            'avatar' => ['image', 'max:2048', 'mimes:png,jpg,bmp']
        ]);

        if($request->hasFile('avatar'))
        {
            if(File::exists(public_path($user->avatar)))
            {
                File::delete(public_path($user->avatar));
            }
            $file = $request->file('avatar');
            $imageName = $this->generateFilename() . "." . $file->extension();
            $file->storeAs('uploads/avatars', $imageName);
            $path = "storage/uploads/avatars/" . $imageName;
            ImageOptimizer::optimize($path);
            $user->avatar = $path;
        }

        $user->displayname = $request->displayname;
        $user->description = $request->description;
        $user->save();

        // toastr()->success('Profil wurde aktualisiert.');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8', 'max:128']
        ]);

        $user = Auth::user();

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        toastr()->success('Passwort wurde geändert.');
        return redirect()->back();
    }

}
