@extends('app')
@section('title', '图榜')

@section('content')
<div class="col-xs-12">
  <a class="btn btn-info" href="{{ route('galleries.set_scorable') }}">重置公告牌</a>
  <hr>
</div>
@foreach($galleries as $gallery)
<div class="col-xs-4 col-sm-3 col-md-2">
  <div class="thumbnail">
    <img src="{{ $gallery->get_thumbnail() }}">
    <div class="caption">
      <p>序号：{{ $gallery->id }}</p>
      <p>得分：{{ $gallery->get_score() }}</p>
    </div>
  </div>
</div>
@endforeach
@stop
