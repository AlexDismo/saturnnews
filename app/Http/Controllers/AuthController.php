<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        auth('web')->login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'User not found or password is incorrect'
        ]);
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect()->route('home');
    }
}
