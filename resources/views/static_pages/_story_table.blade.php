<table class="table">
  <thead>
    <th>作品</th>
    <th>描述</th>
    <th>操作</th>
  </thead>
  <tbody>
    <tr>
      <td><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 主要作品</td>
      <td>可以发表的完整作品。</td>
      <td>
        <a class="btn btn-success btn-xs" href="{{ route('stories.create') }}">发布新作</a>
        <a class="btn btn-info btn-xs" href="{{ route('users.stories', Auth::id()) }}">更新旧作</a>
      </td>
    </tr>
  </tbody>
</table>
