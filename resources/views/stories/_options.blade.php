@if(Auth::check() and $story->is_author(Auth::user()))
<div class="dropdown">
  <button class="btn btn-default btn-xs" id="story_option" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="story_option">
    <li><a href="{{ route('sections.create', $story->id) }}">添加章节</a></li>
    <li><a href="{{ route('volums.create', $story->id) }}">添加卷</a></li>
    <li><a href="{{ route('stories.add', $story->id) }}">添加周边</a></li>
    <li><a href="{{ route('stories.edit', $story->id) }}">标题/描述/封面</a></li>
    <li class="divider"></li>
    <li>
      <form class="" action="{{ route('stories.go_delete', $story->id) }}" method="get">
        <button class="btn btn-danger btn-block btn-xs" type="submit" name="button">删除作品</button>
      </form>
    </li>
  </ul>
</div>
@endif
