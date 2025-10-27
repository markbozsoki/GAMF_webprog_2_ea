<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'registered',
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Sikeres regisztráció!');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Sikeres bejelentkezés!');
        }

        return back()->withErrors([
            'name' => 'Hibás felhasználónév vagy jelszó.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Sikeres kijelentkezés!');
    }
}
