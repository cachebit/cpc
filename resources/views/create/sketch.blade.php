@extends('app')
@section('title', '添加新的草图')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>新的草图</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('sketches.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="story_id">选择所属的故事/专辑：</label>
          <select class="form-control" name="story_id">
            @foreach(Auth::user()->stories as $story)
            <option value="{{ $story->id }}">{{ $story->title }}</option>
            @endforeach
          </select>
          <a href="{{ route('stories.create') }}">创建新的故事/专辑</a>
        </div>

        <div class="form-group">
          <label for="image[]">上传多张草图：</label>
          <input class="form-control" type="file" name="image[]" multiple>
        </div>

        @include('form._title_description_form',[
          'title' => '草图的统一名称',
          'description' => '草图的统一描述',
          'title_value' => '',
          'description_value' => '',
        ])

        <button class="btn btn-default" type="submit" name="button">创建</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
