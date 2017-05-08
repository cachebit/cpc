@extends('app')
@section('title', $section->title)

@section('content')
<div class="col-md-3">
  @include('stories._title_description', ['story' => $section->story])
  @include('sections._title_description')
</div>
<div class="col-md-9">
  <h4>添加内容</h4>
  @include('sections._types_table')
</div>
@stop
