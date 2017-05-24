@extends('story')
@section('title', $story->title)

@section('content')
<div class="row">
  <div class="col-xs-8 col-md-9">
    @if(count($story->sections))
    <div class="panel panel-default">
      <div class="panel-heading">
        <ul class="list-inline">
          <li><h3>章节故事</h3></li>
          <li><a class="btn btn-default btn-xs" href="{{ route('sections.create') }}">添加</a></li>
        </ul>
      </div>
      <div class="panel-body">
        @if($story->current_volum)
        <div class="row">
          @foreach($story->volums as $volum)
          <div class="col-xs-6 col-md-4">
            <div class="thumbnail">
              <img src="{{ $volum->covers()->first()->cover_m }}" alt="{{ $volum->title }}的封面">
              <div class="caption">
                <ul class="list-inline">
                  <li><h3>{{ $volum->title }}</h3></li>
                  <li><a class="btn btn-default btn-xs" href="{{ route('volums.edit', $volum->id) }}">编辑</a></li>
                </ul>

                <p>{{ $volum->description }}</p>
                <ul class="list-unstyled">
                  @foreach($story->sections()->where('volum', $volum->volum)->orderBy('created_at', 'desc')->get() as $section)
                  <li><a href="{{ route('sections.show',['stories' => $story->id ,'sections' => $section->id]) }}">{{ $section->title }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <ul class="list-unstyled">
          @foreach($story->sections as $section)
          <li><a href="{{ route('sections.show',['stories' => $story->id ,'sections' => $section->id]) }}">{{ $section->title }}</a></li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
    @endif

    @if(Auth::check() and Auth::user()->id === $story->user->id)
    @include('stories._create_content')
    @endif
  </div>

  <div class="col-xs-4 col-md-3">
    @if(count($story->posters))
      <a href="{{ route('posters.story_posters', $story->id) }}">
      <div class="thumbnail">
          <img class="img-responsive" src="{{ $story->posters->first()->path_s }}" alt="{{ $story->posters->first()->title }}">
          <div class="caption">
            <h4>海报{{ count($story->posters) }}张</h4>
          </div>
      </div>
      </a>
    @endif

    @if(count($story->sketches))
      <a href="{{ route('sketches.story_sketches', $story->id) }}">
      <div class="thumbnail">
          <img class="img-responsive" src="{{ $story->sketches->first()->path_s }}" alt="{{ $story->sketches->first()->title }}">
          <div class="caption">
            <h4>草图{{ count($story->sketches) }}张</h4>
          </div>
      </div>
      </a>
    @endif

    @if(count($story->settings))
      <a href="{{ route('settings.story_settings', $story->id) }}">
      <div class="thumbnail">
          <img class="img-responsive" src="{{ $story->settings->first()->path_s }}" alt="{{ $story->settings->first()->title }}">
          <div class="caption">
            <h4>设定{{ count($story->settings) }}张</h4>
          </div>
      </div>
      </a>
    @endif

    @if(count($story->drafts))
      <a href="{{ route('drafts.story_drafts', $story->id) }}">
      <div class="thumbnail">
          <div class="caption">
            <h4>随笔{{ count($story->drafts) }}篇</h4>
          </div>
      </div>
      </a>
    @endif
  </div>

</div>
@stop
