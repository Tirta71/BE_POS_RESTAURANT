<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Login & Register.Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
          
            return redirect()->intended('/dashboard')->with('success', 'Login successful!');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('Login & Register.Register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|unique:users,name',
            'password' => 'required|min:6',
        ]);


        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();

    
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout successful!');
    }
}
