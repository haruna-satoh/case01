@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset("css/address/edit.css") }}">
@endsection

@section('content')
<div class="address-edit">
    <form action="{{ route('address.update') }}" method="post" class="address-form">
        @csrf
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <h1 class="address-title">住所の変更</h1>

        <label>郵便番号</label>
        <input type="text" name="post_code" value="{{ old('post_code', $address->post_code ?? '') }}">

        <label>住所</label>
        <input type="text" name="address" value="{{ old('address', $address->address ?? '') }}">

        <label>建物名</label>
        <input type="text" name="building" value="{{ old('building', $address->building ?? '') }}">

        <button type="submit" class="update-button">更新する</button>
    </form>
</div>
@endsection