@extends('app')
@section('title', '警告，你正在删除一个作品和所有关联内容，此操作不可恢复。')

@section('content')
<h1 class="text-danger">警告，你正在删除一个作品和所有关联内容，此操作不可恢复。</h1>
@include('stories._title_description')
<form action="{{ route('stories.destroy', $story->id) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <button type="submit" class="btn btn-xs btn-danger delete-btn">！！！删除作品和关联数据！！！</button>
</form>
@stop
