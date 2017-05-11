@extends('app')
@section('title', '已发布作品')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-9">
  @foreach($stories as $story)
  <div class="media">
    <div class="media-left">
      <a href="{{ route('stories.show', $story->id) }}">
        <img class="media-object" src="{{ $story->covers->first()->cover_s }}" alt="{{ $story->title }}">
      </a>
    </div>
    <div class="media-body">
      <ul class="list-inline">
        <li>
          <a href="{{ route('stories.show', $story->id) }}">
            <h4 class="media-heading">{{ $story->title }}</h4>
          </a>
        </li>
        <li>作者：<a href="{{ route('users.show', $story->user->id) }}">{{ $story->user->name }}</a></li>
        <li>发表于：{{ $story->created_at->diffForHumans() }}</li>
      </ul>
      <p class="text-muted">{{ $story->description }}</p>
    </div>
  </div>
  @endforeach
</div>
@stop
