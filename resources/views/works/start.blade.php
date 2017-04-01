@extends('layouts.default')
@section('title', 'Create A Work!')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>Upload Your Works!</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        <form class="form-inline" action="{{ route('works.distribute') }}" method="post">
          {{ csrf_field() }}

          @include('forms._type_selector')

          <button type="submit" name="button" class="btn btn-primary pull-right">next</button>

        </form>

        <hr>

        <div>
          <h5>FAQ:</h5>
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
</div>
@stop
