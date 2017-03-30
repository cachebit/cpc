@extends('layouts.default')
@section('title', 'Forget Password')

@section('content')
<div class="row">
  <div class="col-sm-offset-4 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>Password Reset</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')
        <form action="{{ route('password.reset') }}" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="email">email:</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
          </div>

          <button type="submit" class="btn btn-primary pull-right" name="button">Reset</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
