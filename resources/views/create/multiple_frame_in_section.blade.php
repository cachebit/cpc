@extends('app')
@section('title', '添加多格漫画')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>添加多格漫画</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('multiple_frames.store_in_section', $section->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="image[]">上传多张条漫：</label>
          <input class="form-control" type="file" name="image[]" multiple>
        </div>

        <button class="btn btn-default" type="submit" name="button">创建</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
