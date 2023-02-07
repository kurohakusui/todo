@extends('layouts.app')
@section('content')
<div class="welcome">
    <h1>Todoリスト</h1>
    @auth
    <button type="submit"><a href="{{ route('home') }}">マイページ</a></button>
    <button type="submit"><a href="{{ route('todos.index') }}">一覧</a></button>
    @else
    <button type="submit"><a href="{{ route('register') }}">会員登録</a></button>
    <button type="submit"><a href="{{ route('login') }}">ログイン</a></button>
    @endauth
</div>
@endsection()