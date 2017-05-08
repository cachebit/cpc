@extends('app')
@section('title', '上传作品')

@section('content')
<div class="row">
  <div class="col-sm-3">

  </div>
  <div class="col-sm-6">
    <h3>作品</h3>
    @include('static_pages._story_table')
    <hr>
    <h3>周边</h3>
    @include('static_pages._derivative_table')
  </div>
</div>
@stop
