@extends('layouts.default')
@section('title', 'Sign In')

@section('content')
<div class="row">
  <div class="col-sm-offset-4 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>Sign In</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        <form method="post" action="{{ route('signin') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="email">email:</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">password( <a href="{{ route('password.reset') }}">Forget your password?</a> ):</label>
            <input class="form-control" type="password" name="password">
          </div>

          <div class="checkbox">
            <label><input type="checkbox" name="remember">Remember Me.</label>
          </div>

          <a href="{{ route('signup') }}">Don't have an accout? Sign Up.</a>
          <button class="btn btn-primary pull-right" type="submit">Sign In</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
