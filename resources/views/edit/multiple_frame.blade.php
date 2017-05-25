@extends('app')
@section('title', '编辑多格漫画')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>编辑多格漫画</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('multiple_frames.update', $multiple_frame->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="">原图：</label>
          <img class="img-responsive" src="{{ $multiple_frame->path_s }}">
        </div>

        <div class="form-group">
          <label for="image">上传新图替换：</label>
          <input class="form-control" type="file" name="image">
        </div>

        <button class="btn btn-default" type="submit" name="button">更新</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
