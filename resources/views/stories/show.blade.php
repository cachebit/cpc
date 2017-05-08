@extends('app')
@section('title', $story->title)

@section('content')
@include('stories._title_description')
@if( $story->type === '' )
  <p>作者还未更新正文。</p>
@else

@endif
@stop
