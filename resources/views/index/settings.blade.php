@extends('app')
@section('title', '所有设定')

@section('content')
  @if(count($settings))
  @foreach($settings as $setting)
  <div class="col-xs-3 col-md-2">
    <a href="{{ route('settings.show', $setting->id) }}"><img class="img-responsive" src="{{ $setting->path_s }}" alt="{{ $setting->title }}"></a>
    <br>
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
