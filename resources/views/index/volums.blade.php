@extends('app')
@section('title', $volums->first()->story->title)

@section('content')
<div class="col-xs-12">
  <h3><a href="{{ route('stories.show', $volums->first()->story->id) }}">{{ $volums->first()->story->title }}</a> 所有分卷</h3>
</div>
@if(count($volums))
@foreach($volums as $volum)
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
      <ul class="list-unstyled">
        @foreach($volum->story->sections()->where('volum', $volum->volum)->get() as $section)
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
    </div>
  </div>
</div>
@endforeach
@endif
@stop
