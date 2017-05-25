@extends('app')
@section('title', '添加剧本')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>添加剧本</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('texts.store_in_section', $section->id) }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="body">剧本内容</label>
          <textarea class="form-control" name="body" rows="34"></textarea>
        </div>

        <button class="btn btn-default" type="submit" name="button">创建</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
