@extends('layouts.app')
@section('content')
<h3>登録画面</h3>
<form action="{{ route('todos.store') }}" method="post">
    @include('todos.form')
    <button class="blue" type="submit">登録</button>
</form>
@endsection()