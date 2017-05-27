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
    <li>
      @include('options._poster_gallery')
    </li>
  </ul>
  <p>作者：{{ $poster->get_user()->name }}</p>
  <p>{{ $poster->description }}</p>
  <p>评论</p>
</div>
@stop
