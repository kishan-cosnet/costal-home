<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
            ->withSuccess('Signed in');
        }
        return redirect("login")->withErrors(['emailPassword' => 'Email address or password is incorrect.']);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        dd("hello");
        return redirect("login")->withErrors(['emailPassword' => 'You are not allowed to access']);
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
