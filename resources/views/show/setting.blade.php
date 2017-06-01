@extends('app')
@section('title', $setting->title)

@section('content')
<div class="col-md-6">
  <img class="img-responsive" src="{{ $setting->path }}" alt="{{ $setting->title }}">
</div>
<div class="col-md-6">
  <ul class="list-inline">
    <li><h3>{{ $setting->title }}</h3></li>
    <li>@include('options._setting')</li>
    <li>
  </ul>
  <ul class="list-inline">
    <li>画廊操作</li>
    <li>@include('options._setting_ups')</li>
    <li><a class="btn btn-default btn-xs" href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></a></li>
  </ul>
  <ul class="list-inline">
    <li>作者：{{ $setting->get_user()->name }}</li>
  </ul>
  <p>{{ $setting->description }}</p>
  <p>评论</p>
  <p class="well">好棒，真的超喜欢！</p>
</div>
@stop
