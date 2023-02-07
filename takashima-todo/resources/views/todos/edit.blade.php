@extends('layouts.app')
@section('content')
<h3>編集画面</h3>
<form action="{{ route('todos.update',$articles) }}" method="post">
    <dt>ID</dt>
    <dd>{{ $articles->id }}</dd>
    @method('put')
    @include('todos.form')
    <button class="blue" type="submit">更新</button>
</form>
@endsection()