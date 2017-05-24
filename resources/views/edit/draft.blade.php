@extends('app')
@section('title', '编辑随笔')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('shared.errors')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>编辑随笔</h3>
    </div>
    <div class="panel-body">
      <form action="{{ route('drafts.update', $draft->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @include('form._title_description_form',[
          'title' => '随笔名称',
          'description' => '随笔描述',
          'title_value' => $draft->title,
          'description_value' => $draft->description,
        ])

        <div class="form-group">
          <label for="content">随笔内容：</label>
          <textarea class="form-control" name="content" rows="13">{{ $draft->body }}</textarea>
        </div>

        <button class="btn btn-default" type="submit" name="button">更新</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
