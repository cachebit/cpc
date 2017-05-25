@extends('app')
@section('title', $section->title)

@section('content')
<div class="col-md-3">
  @include('show._story_info')
  @if(count($story->volums))
  @include('show._volum_info', ['volum' => $section->imageable])
  @endif
</div>
<div class="col-md-9">
  <div class="media">
    <div class="media-left">
      <a href="{{ $section->covers()->first()->cover }}">
        <img class="media-object thumbnail"src="{{ $section->covers()->first()->cover_s }}" alt="{{ $section->title }}">
      </a>
    </div>
    <div class="media-body">
      <ul class="list-inline">
        <li><h4>{{ $section->title }}</h4></li>
        <li>@include('sections._options')</li>
      </ul>
      <p>{{ $section->description }}</p>
    </div>
  </div>
  @if($story->type === '条漫')

    @include('show._webtoons')

  @elseif($story->type === '多格漫画')

    @include('show._multiple_frames')

  @elseif($story->type === '文字剧本')

    @include('show._texts')

  @elseif($story->type === '')

    <p>-未更新任何内容-</p>

  @endif
</div>
@stop
