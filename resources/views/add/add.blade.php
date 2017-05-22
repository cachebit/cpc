@extends('app')
@section('title', $story->title)

@section('content')
<div class="col-md-3">
  @include('show._story_info')
</div>
<div class="col-md-9">
  @include('stories._create_content')
</div>
@stop
