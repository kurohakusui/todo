@extends('layouts.app')
@section('content')
<h3>一覧画面</h3>

<form action="{{route('todos.index')}}" method="get">
    <p>フリーワード</p>
    <input name="search" type="text" value="@if (isset($search)) {{ $search }} @endif" >
    <button type="submit">検索</button>
    <button type="submit"><a href="{{ route('todos.index') }}">クリア</a></button>
</form>
@include('todos.articles')
@endsection()