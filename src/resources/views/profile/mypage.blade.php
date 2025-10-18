@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage__user">
    <div class="user__icon--img">
        <img src="{{ $user->icon ? asset('storage/'.$user->icon) : asset('images/default-icon.png') }}" alt="">
    </div>
    <p class="user__name">
        {{ $user->name }}
    </p>
    <a href="/mypage/profile" class="link__button">
        プロフィールを編集
    </a>
</div>
<div class="mypage-list">
        <div class="mypage-list__title">
            <a href="/mypage?page=sell" class="mypage-list__button {{ request()->query('page') === 'sell' ? 'is-active' : '' }}">出品した商品</a>
            <a href="/mypage?page=buy" class="mypage-list__button {{ request()->query('page') === 'buy' ? 'is-active' : '' }}">購入した商品</a>
        </div>
        @if ($items->count() > 0)
            <div class="mypage-list__content">
                @foreach ($items as $item)
                    <div class="mypage-list__content--item">
                        <div class="mypage-list__content--img">
                            <img src="{{ asset('images/' . $item->image) }}" alt="商品画像">
                        </div>
                        <p>{{  $item->name }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    @endsection
</div>