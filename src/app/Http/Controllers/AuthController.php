<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {
        return redirect()->route('register.form')->with('success', '登録成功！');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            "login" => "ログイン情報が登録されていません",
        ])->withInput();
    }
}
