@extends('app')
@section('title', $story->title)

@section('content')
<div class="col-md-3">
  @include('stories._title_description')
</div>
<div class="col-md-9">
  <h3>所有章节</h3>
  <hr>
  @if(count($story->sections))
  <ul class="list-unstyled">
  @foreach($story->sections as $section)
    <li>
      <a href="{{ route('sections.show', $section->id) }}">
        {{ $section->title }}
      </a>
      <i class="pull-right text-muted">发表于：{{ $section->created_at->diffForHumans() }}</i>
    </li>
  @endforeach
  </ul>
  @else
    <p class="well">
      还没有更新任何章节。
      @if(Auth::check() and Auth::user()->id === $story->user->id)
      <a class="btn btn-success btn-xs" href="{{ route('stories.add_section', $story->id) }}">立即更新</a>
      @endif
    </p>
  @endif
</div>

@stop
