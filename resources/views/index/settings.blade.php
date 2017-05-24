@extends('app')
@section('title', '所有设定')

@section('content')
  @if(count($settings))
  @foreach($settings as $setting)
  <div class="col-xs-3 col-md-2">
    <form class="" action="{{ route('settings.destroy', $setting->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button class="btn btn-danger btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
    </form>
    <a href="{{ route('settings.show', $setting->id) }}"><img class="img-responsive" src="{{ $setting->path_s }}" alt="{{ $setting->title }}"></a>
  </div>
  @endforeach
  @else
  <div class="col-xs-12">
    <p>-未上传任何草图-</p>
  </div>
  @endif
@stop
