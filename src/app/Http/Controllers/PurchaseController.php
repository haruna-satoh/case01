<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PurchaseController extends Controller
{
    public function create(Request $request, Item $item) {
        $method = $request->payment_method;
        return view('purchase.create', compact('item', 'method'));
    }

    public function store(Request $request, Item $item) {
        Stripe::setApiKey(config('services.stripe.secret'));

        $method = $request->input('payment_method');

        $paymentMethods = ['card'];
        if ($method === 'convenience') {
            $paymentMethods = ['konbini'];
        }

        $session = Session::create([
            'payment_method_types' => $paymentMethods,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => $item->name,
                    ],
                    'unit_amount' => $item->price,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',

            'success_url' => route('purchase.success', $item),

            'cancel_url' => route('purchase.cancel', $item),
        ]);

        return redirect($session->url);
    }

    public function success(Item $item) {
        Purchase::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
            'quantity' => 1,
        ]);

        return redirect()->route('items.index')->with('success', '購入が完了しました');
    }

    public function cancel(Item $item) {
        return redirect()->route('item.show', $item)->with('error', '決済がキャンセルされました');
    }
}
