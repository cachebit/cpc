@extends('app')
@section('title', $section->title)

@section('content')
<div class="col-md-9 col-md-push-3">
  @unless($section->story->current_volum === 0)
  @if($section->volum)
  @include('stories.volum',[
    'volum' => $section->story->volums()->where('volum', $section->volum)->first()
  ])
  @else
  <ul class="list-inline">
    <li>未归属卷</li>
    @if(Auth::check() and Auth::user()->id === $section->story->user->id)
    <li>
      @include('stories._volum_select_form',[
        'volums' => $section->story->volums()->get()
      ])
    </li>
    @endif
  </ul>
  @endif
  @endunless
  @include('sections._title_description')
  <hr>
  <p class="well">
    还没有更新任何内容。
    @if(Auth::check() and Auth::user()->id === $section->story->user->id)
    <h4>添加内容</h4>
    <div class="row">
      @if($section->story->type === '' or $section->story->type === '条漫')
      <div class="col-xs-6 col-md-4">
        <a class="btn btn-info btn-block" href="{{ route('sections.webtoons', $section->id) }}">
          <dl>
            <dt><h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 条漫</h3></dt>
            <dd>适合手机的漫画</dd>
          </dl>
        </a>
        <br>
      </div>
      @endif
      @if($section->story->type === '' or $section->story->type === '多格漫画')
      <div class="col-xs-6 col-md-4">
        <a class="btn btn-info btn-block" href="{{ route('sections.multiple_frames', $section->id) }}">
          <dl>
            <dt><h3><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 多格漫画</h3></dt>
            <dd>传统漫画</dd>
          </dl>
        </a>
        <br>
      </div>
      @endif
      @if($section->story->type === '' or $section->story->type === '剧本')
      <div class="col-xs-6 col-md-4">
        <a class="btn btn-info btn-block" href="{{ route('sections.texts', $section->id) }}">
          <dl>
            <dt><h3><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 文字剧本</h3></dt>
            <dd>故事的剧本</dd>
          </dl>
        </a>
        <br>
      </div>
      @endif
    </div>
    @endif
  </p>
</div>
<div class="col-md-3 col-md-pull-9">
  @include('stories._title_description',['story' => $section->story])
  <h3>所有章节</h3>
  <hr>
  <ul class="list-unstyled">
  @foreach($section->story->sections as $section)
    <li>
      <a href="{{ route('sections.show', $section->id) }}">
        {{ $section->title }}
      </a>
    </li>
  @endforeach
  </ul>
</div>
@stop
