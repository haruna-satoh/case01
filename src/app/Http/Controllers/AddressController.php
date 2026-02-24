<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

class AddressController extends Controller
{
    public function edit(Item $item) {
        $user = auth()->user();
        $address = $user->address;

        return view('address.edit', compact('item', 'address'));
    }

    public function update(Request $request) {
        $request->validate([
            'post_code' => 'required',
            'address' => 'required',
        ]);

        $user = auth()->user();

        $user->address()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'post_code' => $request->post_code,
                'address' => $request->address,
                'building' => $request->building ?? '',
            ]
        );

        return redirect()->route('purchase.create', $request->item_id)->with('success', '住所を変更しました');
    }
}
