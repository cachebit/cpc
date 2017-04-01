@extends('layouts.default')
@section('title', $request->genre.' generator')

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
        <h5>{{ $request->genre.' generator' }}</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        @include('works._title_volum_section')

        <form method="post" action="{{ route($request->genre.'.store') }}">
          {{ csrf_field() }}

          @if($request->genre === 'scenarios')
          <div class="form-group">
            <label for="content">content:</label>
            <textarea class="form-control" name="content" rows="8"></textarea>
          </div>
          @else
          <div class="form-group">
            <label for="image">image:</label>
            <input class="form-control" type="file" name="image">
          </div>
          @endif

          <button class="btn btn-primary pull-right" type="submit" name="button">submit</button>
        </form>

      </div>
    </div>
  </div>



</div>
@stop
