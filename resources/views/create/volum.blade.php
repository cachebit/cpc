@extends('app')
@section('title', $story->title)

@section('content')
  <div class="col-md-3">
    @include('show._story_title_description')
  </div>
  <div class="col-md-3">
    <h3>所有卷/篇</h3>
    @if(count($story->volums))
    <ul>
      @foreach($story->volums as $volum)
      <li>{{ $volum->title }}</li>
      @endforeach
    </ul>
    @else
    <p>没有卷。</p>
    @endif
  </div>
  <div class="col-md-6">
    <h3>添加卷/篇</h3>
    <form action="{{ route('volums.store', $story->id) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="image">封面：</label>
        <input class="form-control" type="file" name="image">
      </div>

      @include('form._title_description_form', [
        'title' => '卷/篇标题',
        'description' => '卷/篇简介',
        'title_value' => '',
        'description_value' => ''
      ])

      <button type="submit" name="button">创建</button>
    </form>
  </div>
@stop
