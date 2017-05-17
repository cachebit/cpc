@extends('app')
@section('title', '发布新作品')

@section('content')
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

        @include('form._title_description_form', [
          'title' => '故事/专辑标题',
          'description' => '故事/专辑简介',
          'title_value' => '',
          'description_value' => ''
        ])

        <button class="btn btn-primary pull-right" type="submit" name="button">创建</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
