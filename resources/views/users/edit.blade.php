@extends('layouts.default')
@section('title', 'Edit User\'s File')

@section('content')
@include('shared.errors')
<div class="panel panel-default">
  <div class="panel-heading">
    <h5>Edit User's info.</h5>
  </div>
  <div class="panel-body">
    <span class="col-sm-4">
      <img class="img-responsive" src="{{ $user->portrait_path }}" alt="{{ $user->name }}">
    </span>
    <span class="col-sm-8">
      <form action="{{ route('users.update', $user->id) }}" method="post">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group">
          <label for="name">name:</label>
          <input class="form-control" type="text" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
          <label for="email">email:</label>
          <input class="form-control" type="text" name="email" value="{{ $user->email }}" disabled>
        </div>

        <div class="form-group">
          <label for="original_password">original password:</label>
          <a href="#">Forget your password?</a>
          <input class="form-control" type="password" name="original_password">
        </div>



        <div class="form-group">
          <label for="password">password:</label>
          <input class="form-control" type="password" name="password">
        </div>

        <div class="form-group">
          <label for="password_confirmation">confirmation:</label>
          <input class="form-control" type="password" name="password_confirmation">
        </div>

        <a class="btn btn-warning pull-left" href="{{ route('users.show', $user->id) }}">back to info</a>
        <button class="btn btn-primary pull-right" type="submit" name="button">update</button>
      </form>
    </span>
  </div>
  <div class="panel-footer">
    <ul class="nav nav-pills">
      <li><a href="#">works</a></li>
      <li><a href="#">friends</a></li>
      <li><a href="#">fans</a></li>
      <li><a href="{{ route('users.edit', Auth::user()->id) }}">change user's info</a></li>
    </ul>
  </div>
</div>
@can('update', $user)
<div class="panel panel-danger">
  <div class="panel-heading">
    <h5>CAUSION! Below Behaviers are Dangerous!!!</h5>
  </div>
  <div class="panel-body">
    <form action="{{ route('users.destroy', $user->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <div class="form-group">
        <label for="password">password:</label>
        <input class="form-control" type="password" name="password">
      </div>
      <button type="submit" class="btn btn-danger btn-block" name="button">DELETE MY ACCOUNT</button>
    </form>
  </div>
</div>
@endcan
@stop
