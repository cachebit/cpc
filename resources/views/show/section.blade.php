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
  <ul class="list-inline">
    <li><h3>{{ $section->title }}</h3></li>
    <li>@include('sections._options')</li>
  </ul>
  <p>{{ $section->description }}</p>
  <img class="img-responsive" src="{{ $section->covers()->first()->cover }}" alt="{{ $section->title }}的封面">
  <hr>
  @if($story->type === '条漫')

    @include('show._webtoons')

  @elseif($story->type === '多格漫画')

    @include('show._multiple_frames')

  @elseif($story->type === '文字剧本')

    @include('show._texts')

  @elseif($story->type === '')

    @include('show._section_no_content')

  @endif
</div>
@stop
