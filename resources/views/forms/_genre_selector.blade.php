@if($type === 'sketches' || $type === 'posters')
<div class="form-group">
  <label for="type">genre:</label>
  <select class="form-control" name="genre">
    <option value="single_frames">single frames</option>
  </select>
</div>
@elseif($type === 'drafts')
<div class="form-group">
  <label for="type">genre:</label>
  <select class="form-control" name="genre">
    <option value="scenarios">scenarios</option>
  </select>
</div>
@elseif($type === 'settings')
<div class="form-group">
  <label for="type">genre:</label>
  <select class="form-control" name="genre">
    <option value="single_frames">single frames</option>
    <option value="scenarios">scenarios</option>
  </select>
</div>
@else
<div class="form-group">
  <label for="type">genre:</label>
  <select class="form-control" name="genre">
    <option value="webtoons">webtoons</option>
    <option value="single_frames">single frames</option>
    <option value="multiple_frames">multiple frames</option>
    <option value="scenarios">scenarios</option>
  </select>
</div>
@endif
