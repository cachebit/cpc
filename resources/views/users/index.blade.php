@extends('app')
@section('title', 'All Users.')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  <ul class="list-unstyled">
    @foreach($users as $user)
      @include('users._user')
    @endforeach
  </ul>

  {!! $users->render() !!}
</div>
@stop
