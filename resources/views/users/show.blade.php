@extends('app')
@section('title', $user->name)

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h5>User's info.</h5>
  </div>
  <div class="panel-body">
    <span class="col-sm-3">
      <img class="img-responsive" src="{{ $user->portrait_path }}" alt="{{ $user->name }}">
    </span>
    <span class="col-sm-9">
      <p>{{ $user->character }} : {{ $user->name }}</p>
      <hr>
      <p>email: {{ $user->email }}</p>
      <p>prestige: {{ $user->prestige }}</p>
      <p>experience: {{ $user->experience }}</p>
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
@stop
