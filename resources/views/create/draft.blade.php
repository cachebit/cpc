@extends('app')
@section('title', '添加新的随笔')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>新的随笔</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('drafts.store') }}" method="post">
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

        @include('form._title_description_form',[
          'title' => '随笔名称',
          'description' => '随笔描述',
          'title_value' => '',
          'description_value' => '',
        ])

        <div class="form-group">
          <label for="content">随笔内容：</label>
          <textarea class="form-control" name="content" rows="13"></textarea>
        </div>

        <button class="btn btn-default" type="submit" name="button">创建</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
