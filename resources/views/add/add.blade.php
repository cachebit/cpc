@extends('app')
@section('title', $story->title)

@section('content')
<div class="col-md-3">
  @include('stories._title_description')
</div>
<div class="col-md-9">
  @include('add._add_story_derivative')
</div>
@stop
