<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

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
}
