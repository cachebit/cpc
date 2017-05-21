@extends('story')
@section('title', '编辑章节故事')

@section('content')

@include('shared.errors')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3>编辑章节故事</h3>
  </div>
  <div class="panel-body">
    <form action="{{ route('sections.update', [$story->id, $section->id]) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}

      <div class="form-group">
        <img class="img-responsive thumbnail" src="{{ $section->covers()->first()->cover_m }}" alt="{{ $section->title }}">
        <label for="image">封面：</label>
        <input class="form-control" type="file" name="image">
      </div>

      @include('form._title_description_form',[
        'title' => '章节标题：',
        'description' => '章节描述：',
        'title_value' => $section->title,
        'description_value' => $section->description,
      ])

      <button class="btn btn-primary pull-right" type="submit" name="button">创建</button>
    </form>
  </div>
</div>
@stop
