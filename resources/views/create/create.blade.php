@extends('app')
@section('title', '上传作品')

@section('content')
<div class="col-xs-12 col-sm-4 col-md-3">
  <h4 class="text-muted">请先创建故事/专辑</h4>
  <a class="btn btn-default btn-block" href="{{ route('stories.create') }}">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 故事/专辑</h4></dt>
      <dd>故事/专辑</dd>
    </dl>
  </a>
  <br>

  <h4 class="text-muted">长篇故事可以分卷/篇</h4>
  <a class="btn btn-default btn-block" href="{{ route('volums.create') }}">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 卷/篇</h4></dt>
      <dd>卷/篇</dd>
    </dl>
  </a>
  <br>

  <h4 class="text-muted">给故事/卷/篇添加章节</h4>
  <a class="btn btn-default btn-block" href="{{ route('sections.create') }}">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 章节故事</h4></dt>
      <dd>故事的章节</dd>
    </dl>
  </a>
</div>

<div class="col-xs-12 col-sm-8 col-md-9">
  <div class="row">
    @include('stories._create_content')
  </div>
</div>
@stop
