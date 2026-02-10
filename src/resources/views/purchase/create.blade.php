@extends('layouts.app')

@section('content')
    <h1>購入確認</h1>
    <p>{{ $item->name }}</p>
    <p>¥{{ $item->price }}</p>

    <button>購入を確定する</button>
@endsection