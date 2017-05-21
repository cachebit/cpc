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
</div>

<div class="col-xs-12 col-sm-8 col-md-9">
  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-muted">给已有故事/专辑添加内容</h4>
    </div>

    <div class="col-xs-6 col-md-4 col-lg-3">
      <a class="btn btn-primary btn-block" href="#">
        <dl>
          <dt><h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 海报</h4></dt>
          <dd><p>完整的作品</p></dd>
        </dl>
      </a>
      <br>
    </div>

    <div class="col-xs-6 col-md-4 col-lg-3">
      <a class="btn btn-primary btn-block" href="#">
        <dl>
          <dt><h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 草图</h4></dt>
          <dd>未完成的作品。</dd>
        </dl>
      </a>
      <br>
    </div>

    <div class="col-xs-6 col-md-4 col-lg-3">
      <a class="btn btn-primary btn-block" href="#">
        <dl>
          <dt><h4><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 设定</h4></dt>
          <dd>图文记录</dd>
        </dl>
      </a>
      <br>
    </div>

    <div class="col-xs-6 col-md-4 col-lg-3">
      <a class="btn btn-primary btn-block" href="#">
        <dl>
          <dt><h4><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 随笔</h4></dt>
          <dd>创作笔记</dd>
        </dl>
      </a>
      <br>
    </div>

  </div>
</div>
@stop
