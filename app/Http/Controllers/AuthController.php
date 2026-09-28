<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth/login');
    }

    // =========================
    // REGISTER
    // =========================
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Operator',
        ]);

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat!');
    }

    // =========================
    // LOGIN
    // =========================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

           return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'username atau password salah.',
        ])->onlyInput('username');
    }

    // =========================
    // ADMIN
    // =========================
    public function admin()
    {
        return view('admin.dashboard');
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}