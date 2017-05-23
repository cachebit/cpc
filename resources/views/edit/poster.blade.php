@extends('app')
@section('title', '编辑海报')

@section('content')
<div class="col-md-6">

<img class="img-responsive" src="{{ $poster->path }}" alt="{{ $poster->title }}">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>编辑海报</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('posters.update', $poster->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="image">上传海报替换：</label>
          <input class="form-control" type="file" name="image">
        </div>

        @include('form._title_description_form',[
          'title' => '海报名称',
          'description' => '海报描述',
          'title_value' => $poster->title,
          'description_value' => $poster->description,
        ])

        <button class="btn btn-default" type="submit" name="button">更新</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
