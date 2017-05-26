@extends('app')
@section('title', '图榜')

@section('content')
@foreach($galleries as $gallery)
<div class="col-xs-4 col-sm-3 col-md-2">
  <div class="thumbnail">
    <img src="{{ $gallery->get_thumbnail() }}">
    <div class="caption">
      <p>得分：{{ $gallery->get_score() }}</p>
    </div>
  </div>
</div>
@endforeach
@stop
