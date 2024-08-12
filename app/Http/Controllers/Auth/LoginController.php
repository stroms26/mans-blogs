<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string',
        'password' => 'required|string',
    ]);

    // Attempt to authenticate the user
    $credentials = $request->only('name', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed
        return redirect()->intended('posts'); 
    }

    // Authentication failed
    return back()->withErrors([
        'name' => 'The provided credentials do not match our records.',
    ]);
}



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
