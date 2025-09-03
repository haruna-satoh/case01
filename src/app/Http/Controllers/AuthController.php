<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {
        return redirect()->route('register.form')->with('success', '登録成功！');
    }

    public function login(Request $request) {
        return view('login');
    }
}
