<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
      $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
      ]);
  
      if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
        // dd(auth()->user());
        $request->session()->regenerate();
        return redirect('/');
        // return redirect()->intended('dashboard');
      }
  
      return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
      ])->onlyInput('email');
    }
  
    public function logout()
    {
      auth()->logout();
      return redirect('/login');
    }
}