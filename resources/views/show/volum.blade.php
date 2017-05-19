@extends('app')
@section('title', $volum->title.' 之卷 - '.$story->title)

@section('content')
  <div class="col-md-3">
    @include('show._story_info')
  </div>
  <div class="col-md-3">
    <h3>所有卷/篇</h3>
    @if(count($story->volums))
    <ul class="list-unstyled">
      @foreach($story->volums as $volum)
      <li><a href="{{ route('volums.show', [$story->id, $volum->id]) }}">{{ $volum->title }}</a> 之卷</li>
      @endforeach
    </ul>
    @else
    <p>没有卷。</p>
    @endif
  </div>
  <div class="col-md-6">
    <div class="thumbnail">
      <img src="{{ $volum->covers()->first()->cover }}" alt="{{ $volum->title }}的封面">
      <div class="caption">
        <h3>{{ $volum->title }} 之卷</h3>
        <p>{{ $volum->description }}</p>
      </div>
    </div>

  </div>
@stop
