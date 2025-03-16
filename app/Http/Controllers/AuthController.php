<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Display the login form
    public function create()
    {
        return view('auth.login'); // Make sure to create the 'auth/login.blade.php' view
    }

    // Handle login form submission
    public function store(Request $request)
    {
        // Validate the user's input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Login successful!');
        }

        // Return error message if login fails
        return back()->withErrors([
            'email' => 'Invalid credentials. Check the email address and password entered.',
        ])->onlyInput('email');
    }
}
