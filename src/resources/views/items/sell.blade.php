@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
    <div class="sell">
        <div class="sell__title">
            <h2>商品の出品</h2>
        </div>
        <form action="{{ route('items.store') }}" method=post enctype="multipart/form-data" class="form">
            @csrf
            <div class="form__img">
                    <p>商品画像</p>
                <div class="form__detail--img">
                    <img src="" alt="">
                    <label class="form__img--button">
                        画像を選択する
                        <input type="file" name="image" accept="image/jpeg,image/png">
                    </label>
                </div>
                <div class="form__error">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__detail">
                <h3>商品の詳細</h3>
            </div>
            <div class="form__detail--title">
                <p>カテゴリー</p>
            </div>
            <div class="form__detail--content">
                <div class="form__detail--buttons">
                    <div class="form__detail--button">
                        <input type="checkbox" id="1" name="options[]" value="1" {{ is_array(old('options')) && in_array(1, old('options')) ? 'checked' : '' }}>
                        <label for="1">ファッション</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="2" name="options[]" value="2" {{ is_array(old('options')) && in_array(2, old('options')) ? 'checked' : '' }}>
                        <label for="2">家電</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="3" name="options[]" value="3" {{ is_array(old('options')) && in_array(3, old('options')) ? 'checked' : '' }}>
                        <label for="3">インテリア</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="4" name="options[]" value="4" {{ is_array(old('options')) && in_array(4, old('options')) ? 'checked' : '' }}>
                        <label for="4">レディース</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="5" name="options[]" value="5" {{ is_array(old('options')) && in_array(5, old('options')) ? 'checked' : '' }}>
                        <label for="5">メンズ</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="6" name="options[]" value="6" {{ is_array(old('options')) && in_array(6, old('options')) ? 'checked' : '' }}>
                        <label for="6">コスメ</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="7" name="options[]" value="7" {{ is_array(old('options')) && in_array(7, old('options')) ? 'checked' : '' }}>
                        <label for="7">本</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="8" name="options[]" value="8" {{ is_array(old('options')) && in_array(8, old('options')) ? 'checked' : '' }}>
                        <label for="8">ゲーム</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="9" name="options[]" value="9" {{ is_array(old('options')) && in_array(9, old('options')) ? 'checked' : '' }}>
                        <label for="9">スポーツ</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="10" name="options[]" value="10" {{ is_array(old('options')) && in_array(10, old('options')) ? 'checked' : '' }}>
                        <label for="10">キッチン</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="11" name="options[]" value="11" {{ is_array(old('options')) && in_array(11, old('options')) ? 'checked' : '' }}>
                        <label for="11">ハンドメイド</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="12" name="options[]" value="12" {{ is_array(old('options')) && in_array(12, old('options')) ? 'checked' : ''}}>
                        <label for="12">アクセサリー</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="13" name="options[]" value="13" {{ is_array(old('options')) && in_array(13, old('options')) ? 'checked' : '' }}>
                        <label for="13">おもちゃ</label>
                    </div>
                    <div class="form__detail--button">
                        <input type="checkbox" id="14" name="options[]" value="14" {{ is_array(old('options')) && in_array(14, old('options')) ? 'checked' : '' }}>
                        <label for="14">ベビー・キッズ</label>
                    </div>
                </div>
                <div class="form__error">
                    @error('options')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form__detail--title">
                    <p>商品の状態</p>
                </div>
                <div class="form__detail--select">
                    <select name="condition" id="">
                        <option value="">選択してください</option>
                        <option value="良好"{{ old('condition') == '良好' ? 'selected' : '' }}>良好</option>
                        <option value="目立った傷や汚れなし" {{ old('condition') == '目立った傷や汚れなし' ? 'selected' : '' }}>目立った傷や汚れなし</option>
                        <option value="やや傷や汚れあり" {{ old('condition') == 'やや傷や汚れあり' ? 'selected' : '' }}>やや傷や汚れあり</option>
                        <option value="状態が悪い" {{ old('condition') == '状態が悪い' ? 'selected' : '' }}>状態が悪い</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('condition')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__detail">
                <h3>商品名と説明</h3>
            </div>
            <div class="form__detail--name">
                <div class="form__detail--title">
                    <p>商品名</p>
                </div>
                <div class="form__detail--input">
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__detail--brand">
                <div class="form__detail--title">
                    <p>ブランド名</p>
                </div>
                <div class="form__detail--input">
                    <input type="text" name="brand" value="{{ old('brand') }}">
                </div>
            </div>
            <div class="form__detail--explain">
                <div class="form__detail--title">
                    <p>商品の説明</p>
                </div>
                <div class="form__detail--textarea">
                    <textarea name="explain" id="" cols="30" rows="10">{{ old('explain') }}</textarea>
                </div>
                <div class="form__error">
                    @error('explain')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__detail--price">
                <div class="form__detail--title">
                    <p>販売価格</p>
                </div>
                <div class="form__detail--input">
                    <input type="text" name="price" placeholder="¥" value="{{ old('price') }}">
                </div>
                <div class="form__error">
                    @error('price')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button--submit" type="submit">
                    出品する
                </button>
            </div>
        </form>
    </div>
@endsection