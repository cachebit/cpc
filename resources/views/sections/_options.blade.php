@if(Auth::check() and $section->is_author(Auth::user()))
<div class="dropdown">
  <button class="btn btn-default btn-xs" id="section_option" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="section_option">

    @if($story->type === '')
    <li><a href="#">添加内容</a></li>
    @elseif($story->type === '条漫')
    <li><a href="#">添加条漫</a></li>
    @elseif($story->type === '多格漫画')
    <a href="#">添加多格漫画</a>
    @elseif($story->type === '剧本')
    <a href="#">添加剧本</a>
    @endif

    <li><a href="#">编辑标题或描述</a></li>

    <li class="divider"></li>
    <li>
      <form action="#" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="btn btn-danger btn-block btn-xs" type="submit" name="button">删除章节</button>
      </form>
    </li>
  </ul>
</div>
@endif
