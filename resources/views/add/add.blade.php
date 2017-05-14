@extends('app')
@section('title', $story->title)

@section('content')
<div class="col-md-3">
  @include('stories._title_description')
</div>
<div class="col-md-9">
  @include('stories._add_derivative')
</div>
@stop
