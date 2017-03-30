@extends('layouts.default')
@section('title', 'All Users.')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h5>All Users</h5>
  </div>
  <div class="panel-body">
    <ul class="list-unstyled">
      @foreach($users as $user)
        @include('users._user')
      @endforeach
    </ul>

    {!! $users->render() !!}
  </div>
</div>
@stop
