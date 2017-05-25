@extends('story')
@section('title', $story->title)

@section('content')
<div class="row">
  @if(count($story->sections))<!-- only sections -->
  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <ul class="list-inline">
          <li><h4>章节故事</h4></li>
          <li><a class="btn btn-default btn-xs" href="{{ route('sections.create', $story->id) }}">添加</a></li>
        </ul>
      </div>
      <div class="panel-body">
        <ul class="list-unstyled">
          @foreach($story->sections as $section)
          <li><a href="{{ route('sections.show',['stories' => $story->id ,'sections' => $section->id]) }}">{{ $section->title }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  @elseif(count($story->volums))<!-- only volums -->
  <div class="col-xs-12">
    <h3>所有卷/篇</h3>
  </div>
  @foreach($story->volums as $volum)
  <div class="col-xs-12 col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{ $volum->covers()->first()->cover_m }}" alt="{{ $volum->title }}的封面">
      <div class="caption">
        <ul class="list-inline">
          <li><h3>{{ $volum->title }}</h3></li>
          <li><a class="btn btn-default btn-xs" href="{{ route('volums.edit', $volum->id) }}">编辑</a></li>
        </ul>
        <p>{{ $volum->description }}</p>
        <ul class="list-unstyled">
          @foreach($volum->sections as $section)
          <li><a href="{{ route('sections.show',['stories' => $story->id ,'sections' => $section->id]) }}">{{ $section->title }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  @endforeach
  @else
  <div class="col-xs-12">
    <div class="thumbnail">
      <div class="caption">
        <p>-未更新任何章节故事。-</p>
      </div>
    </div>
  </div>
  @endif



    <div class="col-xs-6 col-sm-4 col-md-3">
      <div class="thumbnail">
        @if(count($story->posters))
        <a href="{{ route('posters.story_posters', $story->id) }}">
            <img class="img-responsive" src="{{ $story->posters->first()->path_s }}" alt="{{ $story->posters->first()->title }}">
            <div class="caption">
              <h4>海报{{ count($story->posters) }}张</h4>
            </div>
        </a>
        @else
        <div class="caption">
          <p class="text-center">-未更新任何海报。-</p>
        </div>
        @endif
      </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-3">
      <div class="thumbnail">
        @if(count($story->sketches))
        <a href="{{ route('sketches.story_sketches', $story->id) }}">
            <img class="img-responsive" src="{{ $story->sketches->first()->path_s }}" alt="{{ $story->sketches->first()->title }}">
            <div class="caption">
              <h4>草图{{ count($story->sketches) }}张</h4>
            </div>
        </a>
        @else
        <div class="caption">
          <p class="text-center">-未更新任何草图。-</p>
        </div>
        @endif
      </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-3">
      <div class="thumbnail">
        @if(count($story->settings))
        <a href="{{ route('settings.story_settings', $story->id) }}">
            <img class="img-responsive" src="{{ $story->settings->first()->path_s }}" alt="{{ $story->settings->first()->title }}">
            <div class="caption">
              <h4>设定{{ count($story->settings) }}张</h4>
            </div>
        </a>
        @else
        <div class="caption">
          <p class="text-center">-未更新任何设定。-</p>
        </div>
        @endif
      </div>
    </div>

    <div class="col-xs-6 col-sm-4 col-md-3">
      <div class="thumbnail">
        @if(count($story->drafts))
        <a href="{{ route('drafts.story_drafts', $story->id) }}">
          <img class="img-responsive" src="{{ $story->covers()->first()->cover_s }}" alt="{{ $story->title }}">
            <div class="caption">
              <h4>随笔{{ count($story->drafts) }}篇</h4>
            </div>
        </a>
        @else
        <div class="caption">
          <p class="text-center">-未更新任何随笔。-</p>
        </div>
        @endif
      </div>
    </div>

    @if(Auth::check() and Auth::user()->id === $story->user->id)
    @include('stories._create_content')
    @endif
  </div>
@stop
