@extends('app')
@section('title', $poster->title)

@section('content')
<div class="col-md-6">
  <img class="img-responsive" src="{{ $poster->path }}" alt="{{ $poster->title }}">
</div>
<div class="col-md-6">
  <h3>{{ $poster->title }}</h3>
  <p>{{ $poster->description }}</p>
  <p>评论</p>
</div>
@stop
