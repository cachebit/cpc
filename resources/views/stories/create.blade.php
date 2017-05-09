@extends('app')
@section('title', '发布新作品')

@section('content')
@include('shared.errors')
<div class="col-md-3">

</div>
<div class="col-md-6">
  <form action="{{ route('stories.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="image">封面：</label>
      <input class="form-control" type="file" name="image">
    </div>

    @include('stories._title_description_form', ['title' => '', 'description' => ''])
  </form>
</div>
<div class="col-md-3">

</div>
@stop
