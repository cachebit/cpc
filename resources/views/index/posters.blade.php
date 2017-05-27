@extends('app')
@section('title', '所有海报')

@section('content')
  @if(count($posters))
  @foreach($posters as $poster)
  <div class="col-xs-4 col-sm-3 col-md-2">
    <a href="{{ route('posters.show', $poster->id) }}"><img class="img-responsive" src="{{ $poster->path_s }}" alt="{{ $poster->title }}"></a>
    <br>
  </div>
  @endforeach
  <div class="col-xs-12">
    {!! $posters->render() !!}
  </div>
  @else
  <div class="col-xs-12">
    <p>-未上传任何海报-</p>
  </div>
  @endif
@stop
