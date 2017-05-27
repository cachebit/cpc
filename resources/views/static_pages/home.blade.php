@extends('app')
@section('title', 'home')

@section('content')

  @include('partials._lastest_posters')

  @include('partials._hot_users')

  @include('partials._lastest_sketches')

  @include('partials._hot_users')

  @include('partials._lastest_settings')

  @include('partials._hot_users')
@stop
