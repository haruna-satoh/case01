<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return view('index');
    }

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('register.form')->with('success', '登録成功！');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        }

        return back()->withErrors([
            "login" => "ログイン情報が登録されていません",
        ])->withInput();
    }
}
