@extends('app')
@section('title', '所有海报')

@section('content')
  @if(count($posters))
  @foreach($posters as $poster)
  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
    <div class="thumbnail">
      <a href="{{ route('posters.show', $poster->id) }}">
        <img class="img-responsive" src="{{ $poster->path_s }}" alt="{{ $poster->title }}">
      </a>
      <ul class="list-inline">
        <li>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <a href="{{ route('users.show', $poster->get_user()->id) }}">{{ mb_substr($poster->get_user()->name, 0, 13) }}</a>
        </li>
      </ul>
    </div>
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
