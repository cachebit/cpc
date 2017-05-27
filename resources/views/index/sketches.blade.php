@extends('app')
@section('title', '所有草图')

@section('content')
  @if(count($sketches))
  @foreach($sketches as $sketch)
  <div class="col-xs-3 col-md-2">
    <a href="{{ route('sketches.show', $sketch->id) }}"><img class="img-responsive" src="{{ $sketch->path_s }}" alt="{{ $sketch->title }}"></a>
    <br>
  </div>
  @endforeach

  <div class="col-xs-12">
    {!! $sketches->render() !!}
  </div>
  @else
  <div class="col-xs-12">
    <p>-未上传任何草图-</p>
  </div>
  @endif
@stop
