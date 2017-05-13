@extends('app')
@section('title', $story->title)

@section('content')
<div class="col-md-3">
  @include('stories._title_description')
</div>
<div class="col-md-9">
  @if(count($story->sections))
  <h3>章节故事</h3>
  <hr>
  <ul class="list-unstyled">
    @foreach($story->sections as $section)
    <li>
      <ul class="list-inline">
        <li><a href="{{ route('sections.show', $section->id) }}">{{ $section->title }}</a></li>
        @if($section->volum)
        <li class="pull-right">{{ $section->story->volums()->where('volum', $section->volum)->first()->title}} 之卷</li>
        @elseif($section->story->current_volum)
        <li class="pull-right"><i>更改卷的表单预留</i></li>
        @endif
      </ul>
    </li>
    @endforeach
  </ul>
  @endif

  @if(Auth::check() and Auth::user()->id === $story->user->id)
  <div class="row">
    @include('stories._add_derivative')
  </div>
  @endif
</div>

@stop
