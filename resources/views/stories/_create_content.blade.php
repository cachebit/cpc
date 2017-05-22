<div class="col-xs-12">
  <h4 class="text-muted">给故事/专辑添加内容</h4>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-primary btn-block" href="{{ route('posters.create_in_story', $story->id) }}">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 海报</h4></dt>
      <dd><p>完整的作品</p></dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-primary btn-block" href="#">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 草图</h4></dt>
      <dd>未完成的作品。</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-primary btn-block" href="#">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 设定</h4></dt>
      <dd>图文记录</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-primary btn-block" href="#">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 随笔</h4></dt>
      <dd>创作笔记</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-12">
  <h4 class="text-muted">添加卷/篇和章节</h4>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-default btn-block" href="{{ route('volums.create', $story->id) }}">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 卷/篇</h4></dt>
      <dd>长篇的卷/篇</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-default btn-block" href="{{ route('sections.create', $story->id) }}">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 章节</h4></dt>
      <dd>故事的章节</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-12">
  <h4 class="text-muted">给章节添加内容</h4>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-info btn-block" href="#">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 条漫</h4></dt>
      <dd>适合手机的漫画</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-info btn-block" href="#">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 多格漫画</h4></dt>
      <dd>传统漫画</dd>
    </dl>
  </a>
  <br>
</div>

<div class="col-xs-6 col-md-4 col-lg-3">
  <a class="btn btn-info btn-block" href="#">
    <dl>
      <dt><h4><span class="glyphicon glyphicon-book" aria-hidden="true"></span> 文字剧本</h4></dt>
      <dd>故事的剧本</dd>
    </dl>
  </a>
  <br>
</div>
