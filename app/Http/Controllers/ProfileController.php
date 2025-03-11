<?php

namespace App\Http\Controllers;

use App\Mail\ProfileUpdated;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'profile_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $user = User::find(Auth::id());
   

    if ($request->hasFile('profile_image')) {
        
    
        $path = $request->file('profile_image')->store('profile_images', 'public');
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
        }
        $user->profile_image = $path;
    }
    $user->name = $request->name;
    $user->save();

    Mail::to($user->email)->send(new ProfileUpdated($user));
    return back()->with('success', 'Profile updated successfully.');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = User::find(Auth::id());


    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    Mail::to($user->email)->send(new ProfileUpdated($user));
    return back()->with('success', 'Password updated successfully.');
}
public function updateEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users,email',
    ]);

    $user = User::find(Auth::id());
    $user->email = $request->email;
    $user->save();

    Mail::to($user->email)->send(new ProfileUpdated($user));
    return back()->with('success', 'Email updated successfully.');
}
}
