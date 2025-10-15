<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit() {
        $user = auth()->user();
        $address = $user->address;
        return view('profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request) {
        $user = Auth::user();

        $user->update($request->only([
            'post_code',
            'address',
            'building',
        ]));

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons', 'public');
            $user->icon = $path;
            $user->save();
        }

        return redirect()->route('mypage');
    }

    public function mypage() {
        $user = auth()->user();

        $items = collect([
            (object)['name' => 'テスト商品A', 'image' => 'sample1.jpg', 'purchase' => false],
            (object)['name' => 'テスト商品B', 'image' => 'sample2.jpg', 'purchase' => true],
        ]);

        return view('profile.mypage', compact('items', 'user'));
    }
}
