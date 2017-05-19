@extends('app')
@section('title', '发布更新')

@section('content')

@include('shared.errors')
<div class="col-md-3">
  @include('show._story_title_description')
</div>
<div class="col-md-6">
  <h3>添加新的章节故事</h3>
  <hr>
  <form action="{{ route('sections.store_in_volum', $story->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="volum_id">所属卷：</label>
      <select class="form-control" name="volum_id">
        @foreach($story->volums as $volum)
        <option value="{{ $volum->id }}">{{ $volum->title }} 之卷</option>
        @endforeach
      </select>
    </div>

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
