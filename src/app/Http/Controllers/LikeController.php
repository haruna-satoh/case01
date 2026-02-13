<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class LikeController extends Controller
{
    public function toggle(Item $item) {
        $user = auth()->user();

        if ($item->likedUsers()->where('user_id', $user->id)->exists()) {
            $item->likedUsers()->detach($user->id);
        } else {
            $item->likedUsers()->attach($user->id);
        }

        return back();
    }
}
