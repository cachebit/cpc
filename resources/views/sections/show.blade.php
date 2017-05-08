@extends('app')
@section('title', $section->title)

@section('content')
<div class="col-md-9 col-md-push-3">
  @include('sections._title_description')

  @include('sections._options')

  @include('sections._content')
</div>
<div class="col-md-3 col-md-pull-9">
  @include('stories._title_description',['story' => $section->story])
</div>
@stop
