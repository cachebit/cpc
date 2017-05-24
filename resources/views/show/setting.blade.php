@extends('app')
@section('title', $setting->title)

@section('content')
<div class="col-md-6">
  <img class="img-responsive" src="{{ $setting->path }}" alt="{{ $setting->title }}">
</div>
<div class="col-md-6">
  <h3>{{ $setting->title }}</h3>
  <p>{{ $setting->description }}</p>
  <p>评论</p>
</div>
@stop
