@extends('app')
@section('title', '所有作品')

@section('content')
@if(count($stories))
@foreach($stories as $story)
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
  @include('show._story_info_index')
</div>
@endforeach
<div class="col-xs-12">
  {!! $stories->render() !!}
</div>

@endif
@stop
