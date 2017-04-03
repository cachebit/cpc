@extends('layouts.default')
@section('title', 'Upload')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6">
      <div class="well">
        <form class="" action="{{ route('upload.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <input class="form-contorl" type="file" name="photo">
          </div>
          <button class="btn btn-primary" type="submit" name="button">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
