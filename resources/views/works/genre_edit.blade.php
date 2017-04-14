@extends('layouts.default')
@section('title', 'generator')

@section('content')
<div class="row">
  <div class="col-sm-3">

  </div>
  <div class="col-sm-9">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>{{ 'generator' }}</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        @include('works._title_volum_section')

        @if($genre->content)
        <form method="post" action="{{ route($genre->imageable->genre.'.update') }}"  enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}

          <input type="hidden" name="id" value="{{ $genre->id }}">


          <div class="form-group">
            <label for="content">content:</label>
            <textarea class="form-control" name="content" rows="8">{{ $genre->content }}</textarea>
          </div>

          <button class="btn btn-primary pull-right" type="submit" name="button">submit</button>
        </form>
        @else<form method="post" action="{{ route($genre->imageable->genre.'.update') }}"  enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}

          <input type="hidden" name="id" value="{{ $genre->id }}">

          <div class="form-group">
            <label for="image">image:</label>
            <input class="form-control" type="file" name="image">
          </div>

          <button class="btn btn-primary pull-right" type="submit" name="button">submit</button>
        </form>
        @endif

      </div>
    </div>
  </div>



</div>
@stop
