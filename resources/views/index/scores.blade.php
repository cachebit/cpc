@extends('app')
@section('title', '最近评分')

@section('content')
@foreach($scores as $score)
<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
  <div class="thumbnail">
    <a href="{{ route('galleries.show', $score->gallery->id) }}">
      <img class="img-responsive" src="{{ $score->gallery->get_thumbnail() }}" alt="{{ $score->gallery->get_title() }}">
    </a>
    <div class="caption">
      <p>编号：{{ $score->gallery->id }}</p>
      <p>您的打分：{{ $score->score }}</p>
      <form action="{{ route('scores.destroy', $score->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="btn btn-danger btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      </form>
    </div>
  </div>
</div>
@endforeach
@stop
