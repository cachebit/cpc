<form action="{{ route('change.volum', $section->id) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}

  <select class="form-contorl" name="volum">
    @foreach($section->story->volums as $volum)
    <option value="{{ $volum->volum }}">{{ $volum->title }}</option>
    @endforeach
  </select>

  <button class="btn btn-default btn-xs" type="submit" name="button">更改</button>
</form>
