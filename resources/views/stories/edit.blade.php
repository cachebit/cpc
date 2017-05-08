@extends('app')
@section('title', '编辑')

@section('content')
<form action="{{ route('stories.update', $story->id) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}

  @include('stories._title_description_form', [
    'title' => $story->title,
    'description' => $story->description,
    ])
</form>
@stop
