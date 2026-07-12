<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ================= Register Page =================

    public function register()
    {
        return view('Authentication.Register');
    }

    // ================= Register Store =================

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        // First registered user will be Admin
        $role = User::count() == 0 ? 'admin' : 'user';

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        return redirect()->route('login')
            ->with('success', 'Account created successfully');
    }

    // ================= Login Page =================

    public function login()
    {
        return view('Authentication.Login');
    }

    // ================= Login Check =================

    public function loginCheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Admin Login
            if (Auth::user()->role == 'admin') {

                return redirect()->route('admin.dashboard');

            }

            // User Login
            return redirect('/');

        }

        return back()->with('error', 'Invalid email or password');
    }

    // ================= Logout =================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
