@extends('layouts.default')
@section('title', 'work show')

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
        <h5>work show</h5>
      </div>
      <div class="panel-body">
        <h1 class="text-center">{{ $request->title }}</h1>
        <a href="{{ route($request->genre.'.create', $request->id) }}"></a>

      </div>
    </div>
  </div>



</div>
@stop
