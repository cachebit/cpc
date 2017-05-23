@extends('app')
@section('title', $sketch->title)

@section('content')
<div class="col-md-6">
  <img class="img-responsive" src="{{ $sketch->path }}" alt="{{ $sketch->title }}">
</div>
<div class="col-md-6">
  <h3>{{ $sketch->title }}</h3>
  <p>{{ $sketch->description }}</p>
  <p>评论</p>
</div>
@stop
