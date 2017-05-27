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
      @include('options._sketch_gallery')
    </li>
  </ul>
  <p>作者：{{ $sketch->get_user()->name }}</p>
  <p>{{ $sketch->description }}</p>
  <p>评论</p>
</div>
@stop
