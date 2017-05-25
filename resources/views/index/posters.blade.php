@extends('app')
@section('title', '所有海报')

@section('content')
  @if(count($posters))
  @foreach($posters as $poster)
  <div class="col-xs-3 col-md-2">
    @include('options._poster')
    <a href="{{ route('posters.show', $poster->id) }}"><img class="img-responsive" src="{{ $poster->path_s }}" alt="{{ $poster->title }}"></a>
  </div>
  @endforeach
  @else
  <div class="col-xs-12">
    <p>-未上传任何海报-</p>
  </div>
  @endif
@stop
