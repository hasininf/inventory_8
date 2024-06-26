<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function index()
    {
        if (Auth::check()){
            return redirect()->intended('/dashboard');
        }
        return view('login');
    }
    public function proseslogin (Request $request)  {
        $request->validate(
            [
                'email' => 'required',
            ]
        );
        $credentials = $request->only('email', 'password');
        // dd($request->all());
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'errors' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
