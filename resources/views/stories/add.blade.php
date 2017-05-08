@extends('app')
@section('title', $story->title)

@section('content')
@include('stories._title_description')
<h3>添加正文</h3>
<table class="table">
  <thead>
    <th>类型</th>
    <th>描述</th>
    <th>操作</th>
  </thead>
  <tbody>
    <tr>
      <td><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 正文</td>
      <td>以话/节等为单位的正文内容，可以使条漫、多格漫画或者文字的形式。</td>
      <td>
        <a class="btn btn-success btn-lg" href="{{ route('stories.add_section', $story->id) }}">发布更新</a>
      </td>
    </tr>
  </tbody>
</table>
<h3>添加周边</h3>
<table class="table">
  <thead>
    <th>类型</th>
    <th>描述</th>
    <th>操作</th>
  </thead>
  <tbody>
    <tr>
      <td><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 海报</td>
      <td>完整的作品。</td>
      <td>
        <a class="btn btn-success btn-xs" href="#">上传新作</a>
        <a class="btn btn-info btn-xs" href="#">更新旧作</a>
      </td>
    </tr>
    <tr>
      <td><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 草图</td>
      <td>日常草图、涂鸦记录<br/>为创作完整作品积累素材。</td>
      <td>
        <a class="btn btn-success btn-xs" href="#">上传新涂</a>
        <a class="btn btn-info btn-xs" href="#">更新旧涂</a>
      </td>
    </tr>
    <tr>
      <td><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 设定</td>
      <td>图片加文字，记录完整构思。</td>
      <td>
        <a class="btn btn-success btn-xs" href="#">发布新设</a>
        <a class="btn btn-info btn-xs" href="#">更新旧设</a>
      </td>
    </tr>
    <tr>
      <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 随笔</td>
      <td>日常文思。</td>
      <td>
        <a class="btn btn-success btn-xs" href="#">上传新作</a>
        <a class="btn btn-info btn-xs" href="#">更新旧作</a>
      </td>
    </tr>
  </tbody>
</table>

@stop
