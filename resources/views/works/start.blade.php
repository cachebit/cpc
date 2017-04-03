@extends('layouts.default')
@section('title', 'Create A Work!')

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
        <h5>Upload Your Works!</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        <form class="form-inline" action="{{ route('works.distribute') }}" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="type">type:</label>
            <select class="form-control" name="type">
              <option value="opuscules">Opuscules</option>
              <option value="novellas">Novellas</option>
              <option value="novels">Novels</option>
              <option value="posters">Posters</option>
              <option value="sketches">Sketches</option>
              <option value="drafts">Drafts</option>
              <option value="settings">Settings</option>
            </select>
          </div>


          <button type="submit" name="button" class="btn btn-primary pull-right">next</button>

        </form>

      </div>
    </div>
  </div>
</div>
@stop
