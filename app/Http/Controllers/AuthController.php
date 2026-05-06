<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
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

    public function login(LoginRequest $request)
    {
        // First check email exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()
                ->withErrors([
                    'email' => 'Email not found in our records'
                ])
                ->withInput();
        }

        // Then check password
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()
                ->withErrors([
                    'password' => 'Incorrect password'
                ])
                ->withInput();
        }

        return redirect('/welcome')
            ->with('success', 'Logged in successfully');
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

        return redirect('/login')
            ->with('success', 'Logged out successfully');
    }

    public function showForgot()
    {
        return view('forgot');
    }

    public function sendReset(ForgotPasswordRequest $request)
    {
        $token = bin2hex(random_bytes(16));

        session([
            'reset_email' => $request->email,
            'reset_token' => $token
        ]);

        return redirect('/reset-password?token=' . $token);
    }

    public function showReset(Request $request)
    {
        if (
            !$request->token ||
            $request->token !== session('reset_token') ||
            !session('reset_email')
        ) {
            return redirect('/forgot-password')
                ->with('error', 'Invalid or expired reset request');
        }

        return view('reset');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        // Token validation
        if ($request->token !== session('reset_token')) {
            return back()->with('error', 'Invalid reset token');
        }

        User::where('email', session('reset_email'))->update([
            'password' => Hash::make($request->password)
        ]);

        // Clear reset session
        session()->forget(['reset_email', 'reset_token']);

        return redirect('/login')
            ->with('success', 'Password updated successfully');
    }
}
