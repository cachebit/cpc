@extends('app')
@section('title', '公开展览')

@section('content')
@if(count($galleries))
  @foreach($galleries as $gallery)
  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
    <div class="thumbnail">
      <a href="{{ route('galleries.show', $gallery->id) }}">
        <img class="img-responsive" src="{{ $gallery->get_thumbnail() }}" alt="{{ $gallery->get_title() }}">
      </a>
    </div>
  </div>
  @endforeach
  <div class="col-xs-12">
    {!! $galleries->render() !!}
  </div>
@else
  <div class="col-xs-12">
    <p>-勤劳的您已评完全部晒图，看看其他内容吧！-</p>
  </div>
@endif
@stop
