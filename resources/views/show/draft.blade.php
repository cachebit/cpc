@extends('app')
@section('title', $draft->title)

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <ul class="list-inline">
        <li><h3>{{ $draft->title }}</h3></li>
        <li><a href="{{ route('drafts.edit', $draft->id) }}">编辑</a></li>
      </ul>
    </div>
    <div class="panel-body">
      <p class="text-muted">{{ $draft->description }}</p>
      <hr>
      <p>{{ $draft->content }}</p>
    </div>
    <div class="panel-footer">
      <p>评论</p>
    </div>
  </div>
</div>
@stop
