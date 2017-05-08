@extends('app')
@section('title', '已发布作品')

@section('content')
<div class="col-md-3">

</div>
<div class="col-md-9">
  <table class="table">
    <thead>
      <th>标题</th>
      <th>描述</th>
      <th>作者</th>
      <th>操作</th>
    </thead>
    <tbody>
      @foreach($stories as $story)
      <tr>
        <td><a href="{{ route('stories.show', $story->id) }}">{{ $story->title }}</a></td>
        <td><p class="text-muted">{{ $story->description }}</p></td>
        <td><a href="{{ route('users.show', $story->user->id) }}">{{ $story->user->name }}</a></td>
        <td>
          @include('stories._options')
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
