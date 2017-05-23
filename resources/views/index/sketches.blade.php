@extends('app')
@section('title', '所有草图')

@section('content')
  @if(count($sketches))
  @foreach($sketches as $sketch)
  <div class="col-xs-3 col-md-2">
    <a href="{{ route('skethes.show', $sketch->id) }}"><img class="img-responsive" src="{{ $sketch->path_s }}" alt="{{ $sketch->title }}"></a>
  </div>
  @endforeach
  @else
  <p>-为上传任何草图-</p>
  @endif
@stop
