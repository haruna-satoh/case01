@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="icon__img">
        <img src="" alt="">
    </div>
    <p class="user__name">
        ユーザー名
    </p>
    <a href="/mypage/profile">
        プロフィールを編集
    </a>
@endsection