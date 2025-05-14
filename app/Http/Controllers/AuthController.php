<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Register Form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Register User
    // Register User
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|unique:users', // Validate username
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    // Create new user
    User::create([
        'name' => $request->name,
        'username' => $request->username, // Save username
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('status', 'Registration successful! Please login.');
}


    // Show Login Form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Login User
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        // Redirect to lodge complaint page
        return redirect()->intended('/lodge-complaint');
    } else {
        return back()->withErrors(['username' => 'Invalid credentials']);
    }
}

    
    // Dashboard (After Login)
    public function dashboard()
    {
        return view('dashboard');
    }

    // Logout User
    public function logout(Request $request)
{
    Auth::logout();
    return redirect('/')->with('status', 'Logged out successfully!');
}

}
