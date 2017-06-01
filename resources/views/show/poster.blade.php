@extends('app')
@section('title', $poster->title)

@section('content')
<div class="col-md-6">
  <img class="img-responsive" src="{{ $poster->path }}" alt="{{ $poster->title }}">
</div>
<div class="col-md-6">
  <ul class="list-inline">
    <li><h3>{{ $poster->title }}</h3></li>
    <li>@include('options._poster')</li>
  </ul>
  <ul class="list-inline">
    <li>@include('options._poster_gallery')</li>
    <li>@include('options._poster_ups')</li>
    <li><a class="btn btn-default btn-xs" href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></a></li>
  </ul>
  <ul class="list-inline">
    <li>作者：{{ $poster->get_user()->name }}</li>
  </ul>
  <p>{{ $poster->description }}</p>
  <p>评论</p>
  <p class="well">好棒，真的超喜欢！</p>
</div>
@stop
