@extends('story')
@section('title', $story->title)

@section('content')
  @foreach($story->volums as $volum)
    @include('show._volum_info')
  @endforeach
@stop
