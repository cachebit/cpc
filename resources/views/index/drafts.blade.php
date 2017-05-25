@extends('app')
@section('title', '所有随笔')

@section('content')
  @if(count($drafts))
  @foreach($drafts as $draft)
  <div class="col-xs-6 col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3><a href="{{ route('drafts.show', $draft->id) }}">{{ $draft->title }}</a></h3>
      </div>
      <div class="panel-body">
        <p>{{ $draft->description }}</p>
      </div>
      <div class="panel-footer">
        @include('options._draft')
      </div>
    </div>
  </div>
  @endforeach
  @else
  <div class="col-xs-12">
    <p>-未上传任何随笔-</p>
  </div>
  @endif
@stop
