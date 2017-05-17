@extends('app')
@section('title', $section->title)

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-9">

  @if($section->story->type === '条漫')
    @include('show._webtoons')
  @elseif($section->story->type === '多格漫画')
    @include('show._multiple_frames')
  @elseif($section->story->type === '文字剧本')
    @include('show._texts')
  @else
    @include('show._section_no_content')
  @endif
</div>
@stop
