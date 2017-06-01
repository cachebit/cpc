@if(Auth::check() and $section->is_author(Auth::id()))
<div class="dropdown">
  <button class="btn btn-default btn-xs" id="section_option" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="section_option">

    @if($story->type === '')
    <li><a href="{{ route('sections.add_content', $section->id) }}">添加内容</a></li>
    @elseif($story->type === '条漫')
    <li><a href="{{ route('webtoons.create_in_section', $section->id) }}">添加条漫</a></li>
    @elseif($story->type === '多格漫画')
    <li><a href="{{ route('multiple_frames.create_in_section', $section->id) }}">添加多格漫画</a></li>
    @elseif($story->type === '文字剧本')
    <li><a href="{{ route('texts.create_in_section', $section->id) }}">添加文字剧本</a></li>
    @endif

    <li><a href="{{ route('sections.edit', [$story->id, $section->id]) }}">标题/描述/封面</a></li>

    <li class="divider"></li>
    <li>
      <form action="{{ route('sections.destroy', [$story->id, $section->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="btn btn-danger btn-block btn-xs" type="submit" name="button">删除章节</button>
      </form>
    </li>
  </ul>
</div>
@endif
