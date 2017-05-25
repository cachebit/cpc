@extends('app')
@section('title', '所有设定')

@section('content')
  @if(count($settings))
  @foreach($settings as $setting)
  <div class="col-xs-3 col-md-2">
    @include('options._setting')
    <a href="{{ route('settings.show', $setting->id) }}"><img class="img-responsive" src="{{ $setting->path_s }}" alt="{{ $setting->title }}"></a>
  </div>
  @endforeach
  @else
  <div class="col-xs-12">
    <p>-未上传任何草图-</p>
  </div>
  @endif
@stop
