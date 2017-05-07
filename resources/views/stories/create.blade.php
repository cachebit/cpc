@extends('app')
@section('title', '发布新作品')

@section('content')
<form action="{{ route('stories.store') }}" method="post">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="title">作品名称：</label>
    <input class="form-control" type="text" name="title">
  </div>

  <div class="form-group">
    <label for="description">作品简介：</label>
    <textarea class="form-control" name="description" rows="5"></textarea>
  </div>

  <button type="submit" name="button">提交</button>
</form>
@stop
