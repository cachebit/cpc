@if(Auth::check() and Auth::user()->id === $section->story->user->id)
<div class="dropdown">
  <button class="btn btn-default btn-xs" id="section_option" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="section_option">
    <li><a href="{{ route('sections.add', $section->id) }}">添加内容</a></li>
    <li><a href="{{ route('sections.edit', $section->id) }}">编辑标题或描述</a></li>
    <li class="divider"></li>
    <li>
      <form action="{{ route('sections.destroy', $section->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="btn btn-danger btn-block btn-xs" type="submit" name="button">删除章节</button>
      </form>
    </li>
  </ul>
</div>
@endif
