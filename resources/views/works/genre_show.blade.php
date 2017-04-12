@extends('layouts.default')
@section('title', 'genre show')

@section('content')
<div class="row">
  <div class="col-sm-3">
    @include('works._user_info')
  </div>
  <div class="col-sm-9">
    @include('works._title_volum_section')
    <p class="text-center">发表于：{{ $genre->created_at->diffForHumans() }}</p>
    <hr>

    @if($genre->content)
      <p>{{ $genre->content }}</p>
    @else
      <img class="img-responsive" src="{{ $genre->path }}" alt="{{ $genre->imageable->title }}">
    @endif

    <hr>
  </div>

</div>
@stop
