@extends('app')
@section('title', $story->title)

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-6">
  @include('stories._title_description')
  @include('stories._options')

  <ul class="list-unstyled">
  @foreach($story->sections as $section)
    <li>
      <a href="{{ route('sections.show', $section->id) }}">
        {{ $section->title }}
      </a>
      <i class="pull-right">发表于：{{ $section->created_at->diffForHumans() }}</i>
    </li>
  @endforeach
  </ul>

</div>

@stop
