<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function create(Item $item) {
        return view('purchase.create', compact('item'));
    }

    public function store(Item $item) {
        $user = auth()->user();

        $exists = Purchase::where('user_id', $user->id)->where('item_id', $item->id)->exists();

        if (! $exists) {
            Purchase::create([
                'user_id' => $user->id,
                'item_id' => $item->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('items.index', $item);
    }
}
