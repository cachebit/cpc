@extends('app')
@section('title', '编辑剧本')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>编辑剧本</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('texts.update', $text->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="body">剧本内容</label>
          <textarea class="form-control" name="body" rows="34">{{ $text->body }}</textarea>
        </div>

        <button class="btn btn-default" type="submit" name="button">更新</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
