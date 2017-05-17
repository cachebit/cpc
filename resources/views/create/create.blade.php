@extends('app')
@section('title', '上传作品')

@section('content')
<div class="col-xs-12">
  <h3 class="text-muted">选择你要创建的内容</h3>
  <hr>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-primary btn-block" href="{{ route('posters.create') }}">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 海报</h3></dt>
      <dd><p>完整的作品</p></dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-primary btn-block" href="#">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 草图</h3></dt>
      <dd>未完成的作品。</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-primary btn-block" href="#">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 设定</h3></dt>
      <dd>图文记录</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-primary btn-block" href="#">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 随笔</h3></dt>
      <dd>创作笔记</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-info btn-block" href="#">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 条漫</h3></dt>
      <dd>适合手机的漫画</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-info btn-block" href="#">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 多格漫画</h3></dt>
      <dd>传统漫画</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-info btn-block" href="#">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 文字剧本</h3></dt>
      <dd>故事的剧本</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-warning btn-block" href="{{ route('sections.create') }}">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 章节故事</h3></dt>
      <dd>故事的章节</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-sm-4 col-md-3">
  <a class="btn btn-default btn-block" href="{{ route('stories.create') }}">
    <dl>
      <dt><h3><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 故事/专辑</h3></dt>
      <dd>故事/专辑</dd>
    </dl>
  </a>
  <br>
</div>
@stop
