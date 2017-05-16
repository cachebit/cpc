@extends('app')
@section('title', '发布更新')

@section('content')

@include('shared.errors')
<div class="col-md-4">
  @include('stories._title_description')
</div>
<div class="col-md-8">
  <h3>添加新的章节故事</h3>
  <hr>
  <form action="{{ route('sections.store', $story->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    @include('stories._volum_forms',[
      'volum' => $story->volums()->where('volum', $story->current_volum)->first()
    ])
    <br>
    @include('add._title_description_form',[
      'title' => '',
      'description' => '',
    ])

  </form>
</div>

@stop
