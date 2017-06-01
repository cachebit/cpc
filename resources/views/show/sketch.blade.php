@extends('app')
@section('title', $sketch->title)

@section('content')
<div class="col-md-6">
  <img class="img-responsive" src="{{ $sketch->path }}" alt="{{ $sketch->title }}">
</div>
<div class="col-md-6">
  <ul class="list-inline">
    <li><h3>{{ $sketch->title }}</h3></li>
    <li>@include('options._sketch')</li>
    <li>
  </ul>
  <ul class="list-inline">
    <li>画廊操作</li>
    <li>@include('options._sketch_ups')</li>
    <li><a class="btn btn-default btn-xs" href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></a></li>
  </ul>
  <ul class="list-inline">
    <li>作者：{{ $sketch->get_user()->name }}</li>
  </ul>
  <p>{{ $sketch->description }}</p>
  <p>评论</p>
  <p class="well">好棒，真的超喜欢！</p>
</div>
@stop
