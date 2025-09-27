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
            <div class="form__detail">
                <h3>商品の詳細</h3>
                <div class="from__detail--title">
                    <p>カテゴリー</p>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="1" name="options[]" value="1">
                    <label for="1">ファッション</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="2" name="options[]" value="2">
                    <label for="2">家電</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="3" name="options[]" value="3">
                    <label for="3">インテリア</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="4" name="options[]" value="4">
                    <label for="4">レディース</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="5" name="options[]" value="5">
                    <label for="5">メンズ</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="6" name="options[]" value="6">
                    <label for="6">コスメ</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="7" name="options[]" value="7">
                    <label for="7">本</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="8" name="options[]" value="8">
                    <label for="8">ゲーム</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="9" name="options[]" value="9">
                    <label for="9">スポーツ</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="10" name="options[]" value="10">
                    <label for="10">キッチン</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="11" name="options[]" value="11">
                    <label for="11">ハンドメイド</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="12" name="options[]" value="12">
                    <label for="12">アクセサリー</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="13" name="options[]" value="13">
                    <label for="13">おもちゃ</label>
                </div>
                <div class="form__detail--button">
                    <input type="checkbox" id="14" name="options[]" value="14">
                    <label for="14">ベビー・キッズ</label>
                </div>
                <div class="form__detail--title">
                    <p>商品の状態</p>
                </div>
                <div class="form__detail--select">
                    <select name="condition" id="">
                        <option value="0">選択してください</option>
                        <option value="1">良好</option>
                        <option value="2">目立った汚れなし</option>
                        <option value="3">やや汚れあり</option>
                        <option value="4">状態が悪い</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
@endsection