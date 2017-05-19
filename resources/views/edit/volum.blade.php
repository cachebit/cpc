@extends('app')
@section('title', '编辑'.$volum->title)

@section('content')
<div class="col-md-3">
  @include('show._story_info',['story' => $volum->story])
</div>
<div class="col-md-3">
  <h3>当前封面</h3>
  <img class="img-responsive" src="{{ $volum->covers()->first()->cover_m }}" alt="{{ $volum->title }}的封面">
</div>
<div class="col-md-6">
  @include('shared.errors')
  <form action="{{ route('volums.update', $volum->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group">
      <label for="image">新的封面：</label>
      <input class="form-control" type="file" name="image">
    </div>

    @include('form._title_description_form', [
      'title' => '卷/篇标题',
      'description' => '卷/篇简介',
      'title_value' => $volum->title,
      'description_value' => $volum->description,
    ])

    <button type="submit" name="button">更新</button>
  </form>
</div>
@stop
