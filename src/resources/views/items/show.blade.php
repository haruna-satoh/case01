@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/item/show.css') }}">
@endsection

@section('content')
<div class="item-detail">

    <div class="item-detail__left">
        <div class="item-image">
            <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
        </div>
    </div>

    <div class="item-detail__right">
        <h1 class="item-name">{{ $item->name }}</h1>
        <p class="item-brand">{{ $item->brand }}</p>
        <p class="item-price">¥{{ number_format($item->price) }}<span>(税込)</span></p>

        <div class="item-icons">
            <div class="icon icon--like">
                ♡
                <span>3</span>
            </div>
            <div class="icon icon--comment">
                💬
                <span>{{ $item->comments_count }} </span>
            </div>
        </div>

        <a href="{{ route('purchase.create', $item) }}" class="buy-button">
            購入手続きへ
        </a>

        <h2>商品説明</h2>
        <p>{{ $item->explain }}</p>

        <h2>商品の情報</h2>
        <p>
            カテゴリー
            @foreach ($item->categories as $category)
                <span class="category">{{ $category->category }}</span>
            @endforeach
        </p>
        <p>商品の状態　{{ $item->condition }}</p>

        <h2>コメント({{ $item->comments_count }})</h2>
        <div class="comments">
            @forelse ($item->comments as $comment)
                <div class="comment">
                    <div class="comment__icon">
                        @if ($comment->user->icon)
                            <img src="{{ asset('storage/' . $comment->user->icon) }}" alt="">
                        @else
                            👤
                        @endif
                    </div>
                    <div class="comment__body">
                        <p class="comment__user">
                        {{ $comment->user->name }}
                        </p>

                        <p class="comment__text">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="no-comments">まだコメントがありません</p>
            @endforelse
        </div>

        <h2>商品へのコメント</h2>
        <div class="comment-form">
            @auth
            <form action="/items/{{ $item->id }}/comments" method="post" class="comment-form__body">
                @csrf
                <textarea name="comment" id="" cols="30" rows="10" class="comment-form__textarea"></textarea>

                @error('comment')
                    <p>{{ $message }}</p>
                @enderror

                <button class="comment-form__button" type="submit">
                    コメントを送信する
                </button>
            </form>
            @endauth
        </div>
    </div>
</div>
@endsection