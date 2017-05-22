@extends('app')
@section('title', '所有海报')

@section('content')
  @if(count($posters))
  @foreach($posters as $poster)
  <div class="col-xs-3 col-md-2">
    <a href="{{ $poster->path }}"><img class="img-responsive" src="{{ $poster->path_s }}" alt="{{ $poster->title }}"></a>
  </div>
  @endforeach
  @else
  <p>-为上传任何海报-</p>
  @endif
@stop
