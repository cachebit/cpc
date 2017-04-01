@extends('layouts.default')
@section('title' ,$request->type.' '.$request->genre.' generator')

@section('content')
<div class="row">
  <div class="col-sm-6">
    @include('shared.errors')

    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>{{ $request->type.' '.$request->genre.' generator' }}</h5>
      </div>
      <div class="panel-body">

        <form method="post" action="{{ route('works.store') }}">
          {{ csrf_field() }}

          <input type="hidden" name="type" value="{{ $request->type }}">
          <input type="hidden" name="genre" value="{{ $request->genre }}">

          <div class="form-group">
            <label for="title">title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}">
          </div>

          @if($request->type === 'novel')
          <div class="form-group">
            <label for="volum">volum</label>
            <input class="form-control" type="text" name="volum" value="{{ old('volum') }}">
          </div>
          @endif

          @if($request->type === 'novel' || $request->type === 'novella')
          <div class="form-group">
            <label for="title">section</label>
            <input class="form-control" type="text" name="section" value="{{ old('section') }}">
          </div>
          @endif

          @if($request->genre === 'scenario')
          <div class="form-group">
            <label for="content">content</label>
            <textarea class="form-control" name="content" rows="17" value="{{ old('content') }}"></textarea>
          </div>
          @else
          <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image">
          </div>
          @endif

          <button class="btn btn-primary pull-right" type="submit" name="button">submit</button>
        </form>

      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>FAQ:</h5>
      </div>
      <div class="panel-body">
        <dl class="well">
          <dt>Q: How are you?</dt>
          <dd>
            I'm find! Thank you!
          </dd>
        </dl>
      </div>
    </div>
  </div>

</div>

@stop
