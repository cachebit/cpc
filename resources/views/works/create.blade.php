@extends('layouts.default')
@section('title' ,$type.' generator')

@section('content')
<div class="row">
  <div class="col-sm-4">
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
  <div class="col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>{{ $type.' generator' }}</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        <form method="post" action="{{ route($type.'.store') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="title">title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}">
          </div>

          @if($type === 'novels')
          <div class="form-group">
            <label for="volum">volum</label>
            <input class="form-control" type="text" name="volum" value="{{ old('volum') }}">
          </div>
          @endif

          @if($type === 'novels' || $type === 'novellas')
          <div class="form-group">
            <label for="title">section</label>
            <input class="form-control" type="text" name="section" value="{{ old('section') }}">
          </div>
          @endif

          @include('forms._genre_selector')
          
          <button class="btn btn-primary pull-right" type="submit" name="button">submit</button>
        </form>

      </div>
    </div>
  </div>



</div>

@stop
