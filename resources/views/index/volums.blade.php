@extends('app')
@section('title', '所有卷 - '.$story->title)

@section('content')
<div class="col-xs-12">
  <h3><a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a> 所有分卷</h3>
  <hr>
</div>
@if(count($story->volums))
@foreach($story->volums as $volum)
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
  <div class="thumbnail">
    @if(count($volum->covers))
    <a href="{{ route('volums.show', $volum->id) }}">
      <img class="img-responsive" src="{{ $volum->covers()->first()->cover_m }}" alt="{{ $volum->title }}">
    </a>
    @endif
    <div class="caption">
      <h3>{{ $volum->title }}</h3>
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
      <p>-未更新章节-<a class="btn btn-default pull-right" href="{{ route('sections.create_in_volum', $volum->id) }}">立即更新</a></p>
      @endif
    </div>
  </div>
</div>
@endforeach
@else
<p>没有卷</p>
@endif
@stop
