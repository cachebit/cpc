@if($story->current_volum === 0)
<div class="form-group">
  <label for="volum">卷数(如果故事不需要分卷，请不要在此填写。)：</label>
  <input class="form-control" type="text" name="volum" value="{{ $story->current_volum }}">
</div>

<div class="form-group">
  <label for="volum">卷名(如果故事不需要分卷，请不要在此填写。)：</label>
  <input class="form-control" type="text" name="volum_title">
</div>
@else
<div class="form-group">
  <label for="volum">卷数(如果需要开启新的一卷，请修改卷数。)：</label>
  <input class="form-control" type="text" name="volum" value="{{ $story->current_volum }}">
</div>

<div class="form-group">
  <label for="volum">卷名(如果需要开启新的一卷，请修改卷数后修改卷名。)：</label>
  <input class="form-control" type="text" name="volum_title" value="{{ $story->current_volum }}">
</div>
@endif
