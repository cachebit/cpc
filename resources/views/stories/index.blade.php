@extends('app')
@section('title', '所有作品')

@section('content')
@if(count($stories))
<table class="table">
  <thead>
    <th>标题</th>
    <th>描述</th>
    <th>作者</th>
    <th>操作</th>
  </thead>
  <tbody>
    @foreach($stories as $story)
    <tr>
      <td><a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a></td>
      <td><p class="text-muted">{{ $story->description }}</p></td>
      <td><a href="{{ route('users.show', $story->user->id) }}">{{ $story->user->name }}</a></td>
      <td>
        @if(Auth::check() and Auth::user()->id === $story->user->id)
        <a class="btn btn-success btn-xs" href="#">添加</a>
        <a class="btn btn-warning btn-xs" href="#">修改</a>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@stop
