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

        <form action="{{ route('purchase.create', $item) }}" method="get">
            @csrf
            <div class="purchase-section">
                <label for="">支払い方法</label>
                <select name="payment_method" onchange="this.form.submit()" id="">
                    <option value="">選択してください</option>
                    <option value="convenience" {{ ($method ?? '') === 'convenience' ? 'selected' : '' }}>コンビニ払い</option>
                    <option value="card" {{ ($method ?? '') === 'card' ? 'selected' : '' }}>カード支払い</option>
                </select>
            </div>
        </form>

            <hr>

            <div class="purchase-section purchase-section--border">
                <div class="purchase-section__header">
                    <label for="">配送先</label>
                    <a href="#">変更する</a>
                </div>
                @php $address = $user->address; @endphp

                <p>〒 {{ $address->post_code ?? ''}}</p>
                <p>{{ $address->address ?? '' }}
                    @if(!empty($address->building))
                        {{ $address->building }}
                    @endif
                </p>
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
                    <span>
                    @if($method === 'card')
                        カード支払い
                    @elseif($method === 'convenience')
                        コンビニ払い
                    @else
                        未選択
                    @endif
                    </span>
                </div>
            </div>
            <form action="{{ route('purchase.store', $item) }}" method="post">
                @csrf
                <input type="hidden" name="payment_method" value="{{ $method }}">
                <button class="purchase-button">購入する</button>
        </form>
    </div>
</div>
@endsection