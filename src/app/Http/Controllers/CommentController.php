<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Item $item) {
        Comment::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }
}
