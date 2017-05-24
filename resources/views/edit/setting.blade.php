@extends('app')
@section('title', '编辑设定')

@section('content')
<div class="col-md-6">

<img class="img-responsive" src="{{ $setting->path }}" alt="{{ $setting->title }}">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>编辑设定</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('settings.update', $setting->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="image">上传设定替换：</label>
          <input class="form-control" type="file" name="image">
        </div>

        @include('form._title_description_form',[
          'title' => '设定名称',
          'description' => '设定描述',
          'title_value' => $setting->title,
          'description_value' => $setting->description,
        ])

        <button class="btn btn-default" type="submit" name="button">更新</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
