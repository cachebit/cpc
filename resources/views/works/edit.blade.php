@extends('layouts.default')
@section('title', 'works edit')

@section('content')
<div class="row">
  <div class="col-sm-3">

  </div>
  <div class="col-sm-9">
      @include('shared.errors')

      <form action="{{ route($type.'.update', $work->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="title">title</label>
          <input class="form-control" type="text" name="title" value="{{ $work->title }}">
        </div>

        @if($type === 'novels')
        <div class="form-group">
          <label for="volum">volum</label>
          <input class="form-control" type="text" name="volum" value="{{ $work->volum }}">
        </div>
        @endif

        @if($type === 'novels' || $type === 'novellas')
        <div class="form-group">
          <label for="title">section</label>
          <input class="form-control" type="text" name="section" value="{{ $work->section }}">
        </div>
        @endif

        @if($work->genre === 'scenarios')
          @foreach( $work->scenarios as $scenario)
            <p>{{ $scenario->content }}</p>
          @endforeach
        @else
          @if($work->genre === 'webtoons')
            @foreach( $work->webtoons as $picture)
              <img class="img-responsive" src="{{ $picture->path }}" alt="{{ $work->title }}">
            @endforeach
          @endif
          @if($work->genre === 'single_frames')
            @foreach( $work->single_frames as $picture)
              <img class="img-responsive" src="{{ $picture->path }}" alt="{{ $work->title }}">
            @endforeach
          @endif
          @if($work->genre === 'multiple_frames')
            @foreach( $work->multiple_frames as $picture)
              <img class="img-responsive" src="{{ $picture->path }}" alt="{{ $work->title }}">
            @endforeach
          @endif
        @endif

        <button class="btn btn-primary pull-right" type="submit" name="button">submit</button>

      </form>

  </div>
</div>
@stop
