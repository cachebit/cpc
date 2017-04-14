@extends('layouts.default')
@section('title' ,'index')

@section('content')
@if(count($works))
  <ul>
    @foreach($works as $work)
      <li><a href="{{ route($type.'.show', $work->id) }}">{{ $work->title }}</a></li>
    @endforeach
  </ul>
  {!! $works->render() !!}
@else
  <p>no content</p>
@endif
@stop
