@extends('layouts.app')
@section('content')
<h1 class="page-heading">マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん｜<button class="green" type="submit" onclick="location.href='{{ route('todos.create') }}'">登録</button></p>
@include('todos.articles')
@endsection()