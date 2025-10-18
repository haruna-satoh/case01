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
            <a href="/mypage?page=sell" class="mypage-list__button {{ $page === 'sell' ? 'is-active' : '' }}">出品した商品</a>
            <a href="/mypage?page=buy" class="mypage-list__button {{ $page === 'buy' ? 'is-active' : '' }}">購入した商品</a>
        </div>
        @if ($items->count() > 0)
            <div class="mypage-list__content">
                @forelse ($items as $item)
                    <div class="item-code">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                        <p>{{ $item->name }}</p>
                    </div>
                @empty
                    <p>商品がありません。</p>
                @endforelse
            </div>
        @endif
    @endsection
</div>