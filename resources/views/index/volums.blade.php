@extends('app')
@section('title', '所有卷 - '.$story->title)

@section('content')
<div class="col-xs-12">
  <h3><a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a> 所有分卷</h3>
  <hr>
</div>
@if(count($story->volums))
@foreach($story->volums as $volum)
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
  @include('show._volum_info')
</div>
@endforeach
@else
<p>没有卷</p>
@endif
@stop
