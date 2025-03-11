<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RegistrationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        // Generate a random password
        $randomPassword = str()->random(10);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($randomPassword),
        ]);

        // Store the credentials in registration_details
        RegistrationDetail::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'password' => $randomPassword, // Storing raw password for email
        ]);

        // Send login credentials via email
        Mail::to($user->email)->send(new ContactMail($user->email, $randomPassword));

        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Registration successful! Check your email for login credentials.');
    }
}
