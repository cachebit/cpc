@extends('layouts.default')
@section('title', 'works show')

@section('content')
<div class="row">
  <div class="col-sm-3">

  </div>
  <div class="col-sm-9">
    <div class="text-center">
      <h2>{{ $works->title }}</h2>
      @if($works->volum)
      <h3>{{ $works->volum }}</h3>
      @endif
      @if($works->section)
      <h4>{{ $works->section }}</h4>
      @endif

      <i>By <a href="{{ route('users.show', $works->user_id) }}">{{ $works->user->name }}</a></i>

      <br>

      <i>{{ $works->created_at }}</i>

      <br>

      @if(Auth::user()->id === $works->user_id)
        <a href="{{ route($type.'.edit', $works->id) }}">eidt</a>
      @endif

    </div>


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
