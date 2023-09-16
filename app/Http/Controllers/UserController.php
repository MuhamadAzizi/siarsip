<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        } else {
            return view('login');
        }
    }

    public function auth(Request $request)
    {
        $messages = [
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!'
        ];

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], $messages);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
