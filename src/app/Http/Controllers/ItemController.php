<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ExhibitionRequest;

class ItemController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        $tab = $request->query('tab');

        $query = Item::query();

        if($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        }

        if ($tab === 'mylist') {
            if (!auth()->check()) {
                $items = collect();
                return view ('items.index', compact('items', 'keyword', 'tab'));
            }
            $query->whereHas('likes',function ($q){
                $q->where('user_id', auth()->id());
            });

            $query->whereHas('purchase');

        } else {
            if (auth()->check()) {
            $query->where('user_id', '!=', auth()->id());
            }
        }

        $items = $query->with('purchase')->get();

        return view('items.index', compact('items', 'keyword', 'tab'));
    }

    public function create() {
        return view('items.sell');
    }

    public function store(ExhibitionRequest $request) {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }

        $item = Item::create($validated);

        $item->categories()->attach($validated['options']);

        return redirect()->route('items.index');
    }

    public function show(Item $item){
        $item->load(['categories', 'user', 'comments.user'])->loadCount('comments', 'likedUsers');

        $isLiked = auth()->check()
            ? $item->likedUsers()->where('user_id', auth()->id())->exists() : false;

        return view('items.show', compact('item', 'isLiked'));
    }
}
