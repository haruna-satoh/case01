<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit() {
        $user = auth()->user();
        $address = $user->address;
        return view('profile.edit', compact('user', 'address'));
    }

    public function update(ProfileRequest $request) {
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
        ]);

        if ($user->address) {
            $user->address->update($request->only(['post_code', 'address', 'building']));
        } else {
            $user->address()->create($request->only(['post_code', 'address', 'building']));
        }

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons', 'public');
            $user->icon = $path;
            $user->save();
        }

        return redirect()->route('mypage');
    }

    public function mypage(Request $request) {
        $user = auth()->user();
        $page = $request->query('page', 'sell');

        if ($page === 'sell') {
            $items = Item::where('user_id', $user->id)->get();
        } elseif ($page === 'buy') {
            $items = Item::whereIn('id', function($query) use ($user) {
                $query->select('item_id')->from('purchases')->where('user_id', $user->id);
            })->get();
        } else {
            $items = collect();
        }

        return view('profile.mypage', compact('items', 'user', 'page'));
    }
}
