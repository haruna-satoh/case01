@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="product-list">
        <div class="product-list__title">
            <a href="/" class="product-list__button {{ request()->query('tab') !== 'mylist' ? 'is-active' : '' }}">おすすめ</a>
            <a href="/?tab=mylist" class="product-list__button {{ request()->query('tab') === 'mylist' ? 'is-active' : '' }}">マイリスト</a>
        </div>
        @if ($items->count() > 0)
            <div class="product-list__content">
                @foreach ($items as $item)
                    <div class="product-list__content--item">
                        <a href="{{ route('item.show', $item->id) }}" class="product-link">
                            <div class="product-list__content--img">
                                <img src="{{ asset('images/' . $item->image) }}" alt="商品画像">
                                @if ($item->purchase)
                                    <span class="sold-badge">Sold</span>
                                @endif
                            </div>
                            <p>{{  $item->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            @else
            <p>該当する商品はありません。</p>
        @endif
    </div>
@endsection