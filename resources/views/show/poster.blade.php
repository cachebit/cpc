@extends('app')
@section('title', $poster->title)

@section('content')
<div class="col-md-6">
  <img class="img-responsive" src="{{ $poster->path }}" alt="{{ $poster->title }}">
</div>
<div class="col-md-6">
  <ul class="list-inline">
    <li><h3>{{ $poster->title }}</h3></li>
    <li>
      <form action="{{ route('posters.gallery', $poster->id) }}" method="post">
        {{ csrf_field() }}
        
        <button class="btn btn-info btn-xs" type="submit" name="button">入展</button>
      </form>
    </li>
  </ul>
  <p>{{ $poster->description }}</p>
  <p>评论</p>
</div>
@stop
