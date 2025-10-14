@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage__user">
    <div class="user__icon--img">
        <img src="" alt="">
    </div>
    <p class="user__name">
        ユーザー名
    </p>
    <a href="/mypage/profile" class="link__button">
        プロフィールを編集
    </a>
</div>
@endsection