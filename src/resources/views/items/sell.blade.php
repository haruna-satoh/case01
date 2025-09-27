@extends('layouts.app')

@section('css')
    
@endsection

@section('content')
    <div class="sell">
        <div class="sell__title">
            <h2>商品の出品</h2>
        </div>
        <form action="/sell" method=post class="form">
            @csrf
            <div class="form__img">
                <p>商品画像</p>
                <img src="{{ asset('images/') }}" alt="">
                <button class="form__button">
                    画像を選択する
                </button>
            </div>
        </form>
    </div>
@endsection