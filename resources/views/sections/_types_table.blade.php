<table class="table">
  <thead>
    <th>类型</th>
    <th>描述</th>
    <th>操作</th>
  </thead>
  <tbody>
    @if($section->story->type === '' or $section->story->type === '条漫')
    <tr>
      <td><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 条漫</td>
      <td>从下往下分页的，适合手机阅读的格式。</td>
      <td>
        <a class="btn btn-success btn-xs" href="{{ route('sections.webtoons', $section->id) }}">添加条漫</a>
      </td>
    </tr>
    @endif
    @if($section->story->type === '' or $section->story->type === '多格漫画')
    <tr>
      <td><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 多格漫画</td>
      <td>适合纸媒和大屏幕电子设备的传统多格漫画。</td>
      <td>
        <a class="btn btn-success btn-xs" href="{{ route('sections.multiple_frames', $section->id) }}">添加多格漫画</a>
      </td>
    </tr>
    @endif
    @if($section->story->type === '' or $section->story->type === '剧本')
    <tr>
      <td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 文字</td>
      <td>文字剧本。</td>
      <td>
        <a class="btn btn-success btn-xs" href="{{ route('sections.texts', $section->id) }}">添加剧本</a>
      </td>
    </tr>
    @endif
  </tbody>
</table>
