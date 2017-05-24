@extends('story')
@section('title', '添加新的设定')

@section('content')
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>新的设定</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('settings.store_in_story', $story->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="image[]">上传多张设定：</label>
          <input class="form-control" type="file" name="image[]" multiple>
        </div>

        @include('form._title_description_form',[
          'title' => '设定的统一名称',
          'description' => '设定的统一描述',
          'title_value' => '',
          'description_value' => '',
        ])

        <button class="btn btn-default" type="submit" name="button">创建</button>
      </form>
    </div>
  </div>
@stop
