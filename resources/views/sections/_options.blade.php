@if(Auth::check() and Auth::user()->id === $section->story->user->id)
<div class="dropdown">
  <button class="btn btn-default btn-xs" id="section_option" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="section_option">

    @if($section->story->type === '')
    <li><a href="{{ route('sections.add', $section->id) }}">添加内容</a></li>
    @elseif($section->story->type === '条漫')
    <li><a href="{{ route('sections.webtoons', $section->id) }}">添加条漫</a></li>
    @elseif($section->story->type === '多格漫画')
    <a href="{{ route('sections.multiple_frames', $section->id) }}">添加多格漫画</a>
    @elseif($section->story->type === '剧本')
    <a href="{{ route('sections.texts', $section->id) }}">添加剧本</a>
    @endif
    
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
