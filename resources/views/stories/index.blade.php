@extends('app')
@section('title', '所有作品')

@section('content')
@if(count($stories))
<div class="col-md-3">

</div>
<div class="col-md-9">
  @foreach($stories as $story)
  <ul class="list-inline">
    <li><a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a></li>
    <li>作者：<a href="{{ route('users.show', $story->user->id) }}">{{ $story->user->name }}</a></li>
    <li>发表于：{{ $story->created_at->diffForHumans() }}</li>
    <li><p class="text-muted">{{ $story->description }}</p></li>
  </ul>
  @endforeach
</div>
@endif
@stop
