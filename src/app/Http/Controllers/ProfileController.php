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

        return redirect()->route('index');
    }
}
