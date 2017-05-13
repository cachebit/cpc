<form class="form-inline" action="index.html" method="post">
  {{ csrf_field() }}
  <select name="volum" class="form-control">
    @foreach($volums as $volum)
      <option value="$volum->volum">{{ $volum->title }}</option>
    @endforeach
  </select>
  <button class="btn btn-default"type="submit">更改</button>
</form>
