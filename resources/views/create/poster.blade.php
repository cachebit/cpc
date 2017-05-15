@extends('app')
@section('title', '添加新的海报')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>新的海报</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('posters.store') }}" method="post" enctype="multipart/form-data">
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
          <label for="image[]">上传多张图片：</label>
          <input class="form-control" type="file" name="image[]" multiple>
        </div>

        @include('add._title_description_form',[
          'title' => '',
          'description' => '',
        ])
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>

<!--
先上传多图，设置统一的标题描述，如果为空，则以故事的标题和描述代替

 -->

@stop
