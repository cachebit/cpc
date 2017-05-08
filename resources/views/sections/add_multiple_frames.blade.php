@extends('app')
@section('title', $section->title)

@section('content')
<div class="col-md-3">
  @include('stories._title_description', ['story' => $section->story])
</div>
<div class="col-md-9">
  @include('sections._title_description')
  @include('shared.errors')
  <form class="form-inline" action="{{ route('sections.save_webtoons', $section->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="image[]">上传条漫：</label>
      <input class="form-control" type="file" name="image[]">
    </div>

    <button class="btn btn-success btn-xs" type="submit" name="button">上传</button>
  </form>
</div>
@stop
