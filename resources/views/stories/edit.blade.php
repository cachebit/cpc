@extends('app')
@section('title', '编辑')

@section('content')
@include('shared.errors')
<div class="col-md-9">
  <div class="row">
    <div class="col-sm-4">
      <img class="img-responsive thumbnail" src="{{ $story->cover }}" alt="《{{ $story->title }}》的封面">
    </div>
    <div class="col-sm-8">
      <form action="{{ route('stories.update', $story->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="image">封面：</label>
          <input class="form-control" type="file" name="image">
        </div>

        @include('stories._title_description_form', [
          'title' => $story->title,
          'description' => $story->description,
          ])
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
