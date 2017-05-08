@if(Auth::check() and Auth::user()->id === $section->story->user->id)
<ul class="list-inline">
  <li>
    <form action="{{ route('sections.destroy', $section->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button class="btn btn-danger btn-xs" type="submit" name="button">删除章节</button>
    </form>
  </li>
  <li><a class="btn btn-warning btn-xs" href="{{ route('sections.edit', $section->id) }}">编辑标题或描述</a></li>
  <li><a class="btn btn-success btn-xs" href="{{ route('sections.add', $section->id) }}">添加内容</a></li>
</ul>
@endif
