@extends('layouts.default')
@section('title', 'Reset Password')

@section('content')
<div class="row">
  <div class="col-sm-offset-4 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>password Reset</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        <form action="{{ route('password.update') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group">
            <label for="email">email:</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">password:</label>
            <input type="password" class="form-control" name="password">
          </div>

          <div class="form-group">
            <label for="password_confirmation">confirmation:</label>
            <input type="password" class="form-control" name="password_confirmation">
          </div>

          <button type="submit" class="btn btn-primary">reset</button>
        </form>

      </div>
    </div>
  </div>
</div>
@stop
