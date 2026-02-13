@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase/create.css') }}">
@endsection

@section('content')
<div class="purchase">
    <div class="purchase__left">
        <div class="purchase-item">
            <img src="{{ asset('images/' . $item->image) }}" alt="商品画像">
            <div class="purchase-item__info">
                <h2>{{ $item->name }}</h2>
                <p>¥{{ number_format($item->price) }}</p>
            </div>
        </div>

        <hr>

        <div class="purchase-section">
            <label for="">支払い方法</label>
            <select name="payment_method" id="">
                <option value="">選択してください</option>
                <option value="convenience">コンビニ払い</option>
                <option value="card">カード払い</option>
            </select>
        </div>

        <hr>

        <div class="purchase-section">
            <div class="purchase-section__header">
                <label for="">配送先</label>
                <a href="#">変更する</a>
            </div>
            <p>〒　XXX-YYYY</p>
            <p>ここには住所が入ります</p>
        </div>
    </div>

    <div class="purchase__right">
        <div class="purchase-summary">
            <div class="purchase-summary__row">
                <span>商品代金</span>
                <span>¥{{ number_format($item->price) }}</span>
            </div>
            <div class="purchase-summary__row">
                <span>支払い方法</span>
                <span>コンビニ払い</span>
            </div>
        </div>

        <form action="{{ route('purchase.store', $item) }}" method="post">
            @csrf
            <button class="purchase-button">購入する</button>
        </form>
    </div>
</div>
@endsection