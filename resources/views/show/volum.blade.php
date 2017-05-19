@extends('app')
@section('title', $volum->title.' 之卷 - '.$story->title)

@section('content')
  <div class="col-md-3">
    @include('show._story_info')
    <h3>所有卷/篇</h3>
    @if(count($story->volums))
    <ul class="list-unstyled">
      @foreach($story->volums as $volum)
      <li><a href="{{ route('volums.show', [$story->id, $volum->id]) }}">{{ $volum->title }}</a> 之卷</li>
      @endforeach
    </ul>
    @else
    <p>没有卷。</p>
    @endif
  </div>
  <div class="col-md-9">
    <div class="thumbnail">
      @if(count($volum->covers))
      <a href="{{ route('volums.show', $volum->id) }}">
        <img class="img-responsive" src="{{ $volum->covers()->first()->cover }}" alt="{{ $volum->title }}">
      </a>
      @endif
      <div class="caption">
        <ul class="list-inline">
          <li><h4>{{ $volum->title }}</h4></li>
          <li>@include('options._volum')</li>
        </ul>
        <p>{{ $volum->description }}</p>
        @if(count($volum->sections))
        <ul class="list-unstyled">
          @foreach($volum->sections()->get() as $section)
          <li>
            <a href="{{ route('sections.show', [
            'stories' => $volum->story->id,
            'sections' => $section->id
            ]) }}">
              {{ $section->title }}
            </a>
          </li>
          @endforeach
        </ul>
        @else
        <p>-未更新章节-<a class="btn btn-default pull-right" href="{{ route('sections.create', $volum->story->id) }}">立即更新</a></p>
        @endif
      </div>
    </div>

  </div>
@stop
