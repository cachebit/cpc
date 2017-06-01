@extends('app')
@section('title', '所有草图')

@section('content')
  @if(count($sketches))
  @foreach($sketches as $sketch)
  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
    <div class="thumbnail">
      <a href="{{ route('sketches.show', $sketch->id) }}">
        <img class="img-responsive" src="{{ $sketch->path_s }}" alt="{{ $sketch->title }}">
      </a>
      <ul class="list-inline">
        <li>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <a href="{{ route('users.show', $sketch->get_user()->id) }}">{{ mb_substr($sketch->get_user()->name, 0, 13) }}</a>
        </li>
      </ul>
    </div>
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
