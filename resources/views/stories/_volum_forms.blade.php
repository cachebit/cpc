@if($volum === null)
<p>该故事未分卷</p>
@else
<dl>
  <dt>{{ '第'.$volum->volum.'卷 '.$volum->title }}</dt>
  <dd>{{ $volum->description }}</dd>
</dl>
@endif
<hr>

<button class="btn btn-default btn-block" type="button" data-toggle="collapse" data-target="#add_volum" aria-expanded="false" aria-controls="collapseExample">
  点击增加卷
</button>
<div class="collapse well" id="add_volum">
  <div class="form-group">
    <label for="volum_cover">新卷封面：</label>
    <input class="form-control" type="file" name="volum_cover">
  </div>

  <div class="form-group">
    <label for="volum_title">新卷名：</label>
    <input class="form-control" type="text" name="volum_title">
  </div>

  <div class="form-group">
    <label for="volum_description">新卷描述：</label>
    <textarea class="form-control" name="volum_description" rows="5"></textarea>
  </div>
</div>
