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
      @include('options._setting_gallery')
    </li>
  </ul>
  <p>作者：{{ $setting->get_user()->name }}</p>
  <p>{{ $setting->description }}</p>
  <p>评论</p>
</div>
@stop
