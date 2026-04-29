<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'regex:/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/i',
                'unique:users,email'
            ],
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()   // upper + lower
                    ->numbers()     // at least one number
                    ->symbols()     // special char
            ]
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.regex' => 'Enter a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.mixed' => 'Password must contain both uppercase and lowercase letters',
            'password.numbers' => 'Password must contain at least one number',
            'password.symbols' => 'Password must contain at least one special character',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Registered successfully');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'regex:/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/i'
            ],
            'password' => 'required'
        ], [
            'email.regex' => 'Enter a valid email address'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/welcome');
        }

        return back()
            ->with('error', 'Invalid email or password')
            ->withInput();
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
