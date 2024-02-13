<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        User::query()->create($request->validated());

        return redirect()->route('auth.login')->with('ok', 'Successfully registered');
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $registered = Auth::attempt($request->validated());
        if($registered){
            session()->regenerate();
            return redirect()->route('blog.index')->with('ok', 'Successfully loged');
        }

        return redirect()->route('blog.index')->with('ok', 'Email or password is incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('blog.index')->with('ok', 'Successfully loged out');
    }
}

