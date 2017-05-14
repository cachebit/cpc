@extends('app')
@section('title', $story->title)

@section('content')
<div class="col-md-3">
  @include('stories._title_description')
</div>
<div class="col-md-9">
  @if(count($story->sections))
    <ul class="list-inline">
      <li><h3>章节故事</h3></li>
      <li><a class="btn btn-default btn-xs" href="{{ route('sections.create') }}">添加</a></li>
    </ul>

    <hr>
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
              <li><a href="{{ route('sections.show', $section->id) }}">{{ $section->title }}</a></li>
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
      <li><a href="{{ route('sections.show', $section->id) }}">{{ $section->title }}</a></li>
      @endforeach
    </ul>
    @endif
  @endif



  @if(Auth::check() and Auth::user()->id === $story->user->id)
  <div class="row">
    @include('stories._add_derivative')
  </div>
  @endif
</div>

@stop
