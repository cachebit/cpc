@extends('app')
@section('title', '发布新作品')

@section('content')
@include('shared.errors')
<form action="{{ route('stories.store') }}" method="post">
  {{ csrf_field() }}

  @include('stories._title_description_form', ['title' => '', 'description' => ''])
</form>
@stop
