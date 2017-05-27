@extends('app')
@section('title', '所有作品')

@section('content')
@if(count($stories))
@foreach($stories as $story)
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
  <div class="thumbnail">
    @if(count($story->covers))
    <a href="{{ route('stories.show', $story->id) }}">
      <img class="img-responsive" src="{{ $story->covers()->first()->cover_m }}" alt="{{ $story->title }}">
    </a>
    @endif
    <div class="caption">
      <ul class="list-inline">
        <li>
          <a href="{{ route('stories.show', $story->id) }}">
            <h4>{{ $story->title }}</h4>
          </a>
        </li>
        <li><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <a href="#">{{ $story->type }}</a></li>
        <li>作者：<a href="{{ route('users.show', $story->user->id) }}">{{ substr($story->user->name, 0, 8) }}</a></li>
        <li>发表于：{{ $story->created_at->diffForHumans() }}</li>
      </ul>
      <p class="text-muted">{{ $story->description }}</p>
      <ul class="list-unstyled">
        @if(count($story->volums))
        <li>-<a href="{{ route('volums.index', $story->id) }}">所有卷/篇</a></li>
        @elseif(count($story->sections))
        <li><a href="{{ route('sections.index', $story->id) }}">所有章节</a></li>
        @else
        <p>-未更新内容-</p>
        @endif
      </ul>
    </div>
  </div>

</div>
@endforeach
<div class="col-xs-12">
  {!! $stories->render() !!}
</div>

@endif
@stop
