@extends('app')
@section('title', '编辑海报')

@section('content')
<div class="col-md-6">

<img class="img-responsive" src="{{ $poster->path }}" alt="{{ $poster->title }}">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>编辑海报</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('posters.update', $poster->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

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
          <label for="image">上传海报替换：</label>
          <input class="form-control" type="file" name="image">
        </div>

        @include('form._title_description_form',[
          'title' => '海报名称',
          'description' => '海报描述',
          'title_value' => $poster->title,
          'description_value' => $poster->description,
        ])

        <button class="btn btn-default" type="submit" name="button">更新</button>
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
