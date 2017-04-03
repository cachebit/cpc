@extends('layouts.default')
@section('title', 'genre show')

@section('content')
<div class="row">
  <div class="col-sm-4">
    <img src="{{ $genre->user->portrait_path }}" alt="{{ $genre->user->name }}">
    <h4>作者：<a href="#">{{ $genre->user->name }}</a></h4>
    <dl class="">
      <dt>prestige:</dt>
      <dd>{{ $genre->user->prestige }}</dd>
      <dt>experience:</dt>
      <dd>{{ $genre->user->experience }}</dd>
    </dl>
  </div>
  <div class="col-sm-8">
    @include('works._title_volum_section')
    <p class="text-center">发表于：{{ $genre->created_at->diffForHumans() }}</p>
    <hr>

    @if($genre->content)
      <p>{{ $genre->content }}</p>
    @else
      <img src="{{ $genre->path }}" alt="">
    @endif

    <hr>
  </div>

</div>
@stop
