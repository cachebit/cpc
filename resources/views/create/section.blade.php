@extends('app')
@section('title', '发布更新')

@section('content')

@include('shared.errors')
<div class="col-md-4">
  @include('show._story_info')
</div>
<div class="col-md-8">
  <h3>添加新的章节故事</h3>
  <hr>
  <form action="{{ route('sections.store', $story->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="image">封面：</label>
      <input class="form-control" type="file" name="image">
    </div>

    @include('form._title_description_form',[
      'title' => '章节标题：',
      'description' => '章节描述：',
      'title_value' => '',
      'description_value' => '',
    ])

    <button class="btn btn-primary pull-right" type="submit" name="button">创建</button>
  </form>
</div>

@stop
