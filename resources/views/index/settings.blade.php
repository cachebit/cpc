@extends('app')
@section('title', '所有设定')

@section('content')
  @if(count($settings))
  @foreach($settings as $setting)
  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
    <div class="thumbnail">
      <a href="{{ route('settings.show', $setting->id) }}">
        <img class="img-responsive" src="{{ $setting->path_s }}" alt="{{ $setting->title }}">
      </a>
      <ul class="list-inline">
        <li>
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <a href="{{ route('users.show', $setting->get_user()->id) }}">{{ mb_substr($setting->get_user()->name, 0, 13) }}</a>
        </li>
      </ul>
    </div>
  </div>
  @endforeach
  <div class="col-xs-12">
    {!! $settings->render() !!}
  </div>
  @else
  <div class="col-xs-12">
    <p>-未上传任何草图-</p>
  </div>
  @endif
@stop
