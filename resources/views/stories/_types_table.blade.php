<table class="table">
  <thead>
    <th>类型</th>
    <th>描述</th>
    <th>操作</th>
  </thead>
  <tbody>
    <tr>
      <td><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 条漫</td>
      <td>从下往下分页的，适合手机阅读的格式。</td>
      <td>
        <a class="btn btn-success btn-xs" href="{{ route('sections.webtoons') }}">添加条漫</a>
      </td>
    </tr>
    <tr>
      <td><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 多格漫画</td>
      <td>适合纸媒和大屏幕电子设备的传统多格漫画。</td>
      <td>
        <a class="btn btn-success btn-xs" href="{{ route('sections.multiple_frames') }}">添加多格漫画</a>
      </td>
    </tr>
    <tr>
      <td><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 文字</td>
      <td>文字剧本。</td>
      <td>
        <a class="btn btn-success btn-xs" href="{{ route('sections.texts') }}">添加文字</a>
      </td>
    </tr>
  </tbody>
</table>
