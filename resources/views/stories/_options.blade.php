@if(Auth::check() and Auth::user()->id === $story->user->id)
<ul class="list-inline">
  <li><a class="btn btn-danger btn-xs" href="{{ route('stories.go_delete', $story->id) }}">删除作品</a></li>
  <li><a class="btn btn-warning btn-xs" href="{{ route('stories.edit', $story->id) }}">编辑标题或描述</a></li>
  <li><a class="btn btn-success btn-xs" href="{{ route('stories.add', $story->id) }}">添加</a></li>
</ul>
@endif
