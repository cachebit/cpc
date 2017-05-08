@extends('app')
@section('title', '发布更新')

@section('content')
  @include('stories._title_description')
  <form action="{{ route('stories.save_section', $story->id) }}" method="post">
    {{ csrf_field() }}

    @include('stories._volum_forms')

    @include('stories._title_description_form',[
      'title' => '',
      'description' => '',
    ])

    <input type="hidden" name="story_id" value="{{ $story->id }}">

  </form>
@stop
