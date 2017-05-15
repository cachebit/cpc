@extends('app')
@section('title', '发布新作品')

@section('content')
@include('shared.errors')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>新故事/新专辑</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('stories.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="image">封面：</label>
          <input class="form-control" type="file" name="image">
        </div>

        @include('stories._title_description_form', ['title' => '', 'description' => ''])
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
