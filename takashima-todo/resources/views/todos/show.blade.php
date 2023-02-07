@extends('layouts.app')
@section('content')
<h3>詳細画面</h3>
<article class="article-detail">
    <div class="article-id">{{ $articles->id }}</div>
    <div class="article-title">{{ $articles->title }}</div>
    <button class="greenblue" type="submit" onclick="location.href='{{ route('todos.index') }}'">戻る</button>
</article>
@endsection()