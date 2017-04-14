@extends('layouts.default')
@section('title', 'works show')

@section('content')
<div class="row">
  <div class="col-sm-4">

  </div>
  <div class="col-sm-8">
      <h5>{{ $works->title }}</h5>
      <h5>{{ $works->genre }}</h5>
      <hr>
      @if($works->genre === 'scenarios')
        @foreach( $works->scenarios as $scenario)
          <p>{{ $scenario->content }}</p>
        @endforeach
      @else
        @if($works->genre === 'webtoons')
          @foreach( $works->webtoons as $picture)
            <img class="img-responsive" src="{{ $picture->path }}" alt="{{ $works->title }}">
          @endforeach
        @endif
        @if($works->genre === 'single_frames')
          @foreach( $works->single_frames as $picture)
            <img class="img-responsive" src="{{ $picture->path }}" alt="{{ $works->title }}">
          @endforeach
        @endif
        @if($works->genre === 'multiple_frames')
          @foreach( $works->multiple_frames as $picture)
            <img class="img-responsive" src="{{ $picture->path }}" alt="{{ $works->title }}">
          @endforeach
        @endif
      @endif
  </div>
</div>
@stop
