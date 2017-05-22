@extends('app')
@section('title', $poster->title)

@section('content')
<div class="col-md-12">
  <div class="thmubnail">
    <img src="{{ $poster->path }}" alt="{{ $poster->title }}">
    <div class="caption">

    </div>
  </div>
</div>
@stop
