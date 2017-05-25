@extends('app')
@section('title', $section->title)

@section('content')
<div class="col-md-3">
  @include('show._section_info')
</div>
<div class="col-md-9">
  <div class="row">
    <div class="col-xs-6 col-md-4 col-lg-3">
      <a class="btn btn-info btn-block" href="{{ route('webtoons.create_in_section', $section->id) }}">
        <dl>
          <dt><h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 条漫</h4></dt>
          <dd>适合手机的漫画</dd>
        </dl>
      </a>
      <br>
    </div>

    <div class="col-xs-6 col-md-4 col-lg-3">
      <a class="btn btn-info btn-block" href="{{ route('multiple_frames.create_in_section', $section->id) }}">
        <dl>
          <dt><h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 多格漫画</h4></dt>
          <dd>传统漫画</dd>
        </dl>
      </a>
      <br>
    </div>

    <div class="col-xs-6 col-md-4 col-lg-3">
      <a class="btn btn-info btn-block" href="{{ route('texts.create_in_section', $section->id) }}">
        <dl>
          <dt><h4><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 文字剧本</h4></dt>
          <dd>故事的剧本</dd>
        </dl>
      </a>
      <br>
    </div>

  </div>
</div>
@stop
