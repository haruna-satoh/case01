<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('keyword');

        $query = Item::query();

        if($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        }

        $items = $query->get();

        return view('index', compact('items', 'keyword'));
    }
}
