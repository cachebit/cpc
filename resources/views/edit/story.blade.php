@extends('app')
@section('title', '编辑')

@section('content')
@include('shared.errors')
<div class="col-md-9">
  <div class="row">
    <div class="col-sm-4">
      <img class="img-responsive thumbnail" src="{{ $story->covers()->first()->cover_m }}" alt="《{{ $story->title }}》的封面">
    </div>
    <div class="col-sm-8">
      <form action="{{ route('stories.update', $story->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <label for="image">封面：</label>
          <input class="form-control" type="file" name="image">
        </div>

        @include('form._title_description_form', [
          'title' => '故事/专辑标题',
          'description' => '故事/专辑简介',
          'title_value' => $story->title,
          'description_value' => $story->description,
          ])

        <button class="btn btn-primary pull-right" type="submit" name="button">更新</button>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3">

</div>
@stop
