@extends('app')
@section('title', $section->title)

@section('content')
  @include('stories._title_description',['story' => $section->story])
  <h4>{{ $section->title }}</h4>
  <p>{{ $section->description }}</p>
@stop
