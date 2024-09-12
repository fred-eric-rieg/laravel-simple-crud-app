<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request) {
        $credentials = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:64']
        ]);

        $credentials['password'] = bcrypt($credentials['password']);
        $user = User::create($credentials);
        Auth::login($user);
        return redirect('/');

    }


    public function login(Request $request) {
        $credentials = $request->validate([
            'login_email' => ['required'],
            'login_password' => ['required']
        ]);

        if (Auth::attempt(['email' => $credentials['login_email'], 'password' => $credentials['login_password']])) {
            $request->session()->regenerate();
        }
        
        return redirect('/');
    }


    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
