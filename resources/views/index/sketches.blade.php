@extends('app')
@section('title', '所有草图')

@section('content')
  @if(count($sketches))
  @foreach($sketches as $sketch)
  <div class="col-xs-3 col-md-2">
    <form class="" action="{{ route('sketches.destroy', $sketch->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button class="btn btn-danger btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
    </form>
    <a href="{{ route('sketches.show', $sketch->id) }}"><img class="img-responsive" src="{{ $sketch->path_s }}" alt="{{ $sketch->title }}"></a>
  </div>
  @endforeach
  @else
  <div class="col-xs-12">
    <p>-未上传任何草图-</p>
  </div>
  @endif
@stop
