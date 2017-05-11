@extends('app')
@section('title', $section->title)

@section('content')
<div class="col-md-9 col-md-push-3">
  @include('sections._title_description')
  <hr>
  <p class="well">
    还没有更新任何内容。
    @if(Auth::check() and Auth::user()->id === $section->story->user->id)
    <h4>添加内容</h4>
    @include('sections._types_table')
    @endif
  </p>
</div>
<div class="col-md-3 col-md-pull-9">
  @include('stories._title_description',['story' => $section->story])
  <h3>所有章节</h3>
  <hr>
  <ul class="list-unstyled">
  @foreach($section->story->sections as $section)
    <li>
      <a href="{{ route('sections.show', $section->id) }}">
        {{ $section->title }}
      </a>
      <i class="pull-right text-muted">发表于：{{ $section->created_at->diffForHumans() }}</i>
    </li>
  @endforeach
  </ul>
</div>
@stop
