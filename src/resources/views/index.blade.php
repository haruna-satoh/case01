@extends('layouts.app')

@section('content')
    <div class="flrama__flrama">
        <div class="flrama__title">
            <h3>おすすめ</h3>
            <form action="">
                @csrf
                <button>マイリスト</button>
            </form>
        </div>
        @if ($items->count() > 0)
            @foreach ($items as $item)
                <div class="flrama__content">
                    <div class="flrama__content--img">
                        <img src="{{ asset('images/' . $item->image) }}" alt="商品画像">
                    </div>
                    <div class="flrama__content--item">
                        <p>{{  $item->name }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>該当する商品はありません。</p>
        @endif
@endsection