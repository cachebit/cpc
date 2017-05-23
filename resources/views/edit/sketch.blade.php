@extends('app')
@section('title', '编辑草图')

@section('content')
<div class="col-md-6">

<img class="img-responsive" src="{{ $sketch->path }}" alt="{{ $sketch->title }}">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>编辑草图</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('sketches.update', $sketch->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="image">上传草图替换：</label>
          <input class="form-control" type="file" name="image">
        </div>

        @include('form._title_description_form',[
          'title' => '草图名称',
          'description' => '草图描述',
          'title_value' => $sketch->title,
          'description_value' => $sketch->description,
        ])

        <button class="btn btn-default" type="submit" name="button">更新</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
