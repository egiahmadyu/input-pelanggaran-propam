<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            if ($request->password == '123456') {
                return redirect('/change-password')->with('new_password', true);
            }
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

    public function update_password(Request $request)
    {
        if ($request->password !== $request->repassword) {
            return redirect('/change-password')->with('error', 'Password Tidak Sama');
        }
        User::where('id', auth()->user()->id)
            ->update([
                'password' => bcrypt($request->password)
            ]);
        return redirect('/');
    }
}
