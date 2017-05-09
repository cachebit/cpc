@if(Auth::check() and Auth::user()->id === $story->user->id)
<div class="dropdown">
  <button class="btn btn-default btn-xs" id="story_option" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="story_option">
    <li><a href="{{ route('stories.add_section', $story->id) }}">添加章节</a></li>
    <li><a href="{{ route('stories.add', $story->id) }}">添加周边</a></li>
    <li><a href="{{ route('stories.edit', $story->id) }}">编辑标题/描述/封面</a></li>
    <li class="divider"></li>
    <li><button class="btn btn-danger btn-block btn-xs" href="{{ route('stories.go_delete', $story->id) }}">删除作品</button></li>
  </ul>
</div>
@endif
