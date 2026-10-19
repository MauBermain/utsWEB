<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Auth::attempt membandingkan password dengan hash di database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();   // cegah session fixation
            return redirect()->intended(route('items.index'));
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();        // sesi lama tidak berlaku lagi
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}