@extends('layouts.default')
@section('title', 'Sign Up.')

@section('content')
<div class="row">
  <div class="col-sm-offset-4 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>Sign Up</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        <form method="post" action="{{ route('users.store') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="email">email:</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="name">name:</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
          </div>

          <div class="form-group">
            <label for="password">password:</label>
            <input class="form-control" type="password" name="password">
          </div>

          <div class="form-group">
            <label for="password_confirmation">confirmation:</label>
            <input class="form-control" type="password" name="password_confirmation">
          </div>

          <a href="{{ route('signin') }}">Have an accout? Sign In here.</a>

          <button class="btn btn-primary pull-right" type="submit">Sign up</button>
        </form>
      </div>
    </div>
  </div>
</div>

@stop
