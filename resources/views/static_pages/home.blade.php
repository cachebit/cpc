@extends('app')
@section('title', 'home')

@section('content')
  <div class="col-md-3">

  </div>
  <div class="col-md-6">

  </div>
  <div class="col-sm-3">
    @if (Auth::check())
      @include('layouts._right_column')
    @endif
  </div>
@stop
