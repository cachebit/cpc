@if(Auth::check() and $volum->is_author(Auth::user()))
<div class="dropdown">
  <button class="btn btn-default btn-xs" id="story_option" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="story_option">
    <li><a href="{{ route('sections.create', $volum->story->id) }}">添加章节</a></li>
    <li><a href="{{ route('volums.edit', $volum->story->id) }}">标题/描述/封面</a></li>
    <li class="divider"></li>
    <li>
      <form action="{{ route('volums.destroy', $volum->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-danger btn-block btn-xs" type="submit" name="button">删除卷</button>
      </form>
    </li>
  </ul>
</div>
@endif
