@extends('app')
@section('title', '所有作品')

@section('content')
@if(count($stories))
<div class="col-md-3 col-md-push-9">

</div>
<div class="col-md-9 col-md-pull-3">
  <div class="row">
    @foreach($stories as $story)
    <div class="col-xs-6 col-md-4">
      <div class="thumbnail">
        <a href="{{ route('stories.show', $story->id) }}">
          <img class="img-responsive" src="{{ $story->covers()->first()->cover_m }}" alt="{{ $story->title }}">
        </a>
        <div class="caption">
          <ul class="list-inline">
            <li>
              <a href="{{ route('stories.show', $story->id) }}">
                <h4>{{ $story->title }}</h4>
              </a>
            </li>
            <li>作者：<a href="{{ route('users.show', $story->user->id) }}">{{ $story->user->name }}</a></li>
            <li>发表于：{{ $story->created_at->diffForHumans() }}</li>
          </ul>
          <p class="text-muted">{{ $story->description }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endif
@stop
