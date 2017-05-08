<div class="form-group">
  <label for="title">名称：</label>
  <input class="form-control" type="text" name="title" value="{{ $title }}">
</div>

<div class="form-group">
  <label for="description">简介：</label>
  <textarea class="form-control" name="description" rows="5">{{ $description }}</textarea>
</div>

<button class="btn btn-primary btn-xs pull-right" type="submit" name="button">提交</button>
