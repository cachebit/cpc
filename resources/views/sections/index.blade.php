@extends('app')
@section('title', '所有章节')

@section('content')
@if(count($sections))
<div class="col-md-3">

</div>
<div class="col-md-9">
  <table class="table">
    <thead>
      <th>标题</th>
      <th>摘自</th>
      <th>作者</th>
      <th>发布于</th>
    </thead>
    <tbody>
      @foreach($sections as $section)
      <tr>
        <td><a href="{{ route('sections.show', $section->id) }}">{{ $section->title }}</a></td>
        <td><a href="{{ route('stories.show', $section->story->id) }}">{{ $section->story->title }}</a></td>
        <td><a href="{{ route('users.show', $section->story->user->id) }}">{{ $section->story->user->name }}</a></td>
        <td>
          {{ $section->created_at->diffForHumans() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endif
@stop
