@extends('app')
@section('title', '发布更新')

@section('content')

@include('shared.errors')
<div class="col-md-4">
  @include('stories._title_description')
</div>
<div class="col-md-8">
  <form action="{{ route('stories.save_section', $story->id) }}" method="post">
    {{ csrf_field() }}

    @include('stories._volum_forms')

    <input type="hidden" name="story_id" value="{{ $story->id }}">

    @include('stories._title_description_form',[
      'title' => '',
      'description' => '',
    ])
  </form>
</div>

@stop
