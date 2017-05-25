<div class="row">
  @foreach($section->multiple_frames as $multiple_frame)
  <div class="col-xs-11">
    <img class="img-responsive" src="{{ $multiple_frame->path }}" alt="{{ $section->title }}">
  </div>
  <div class="col-xs-1">
    <form action="{{ route('multiple_frames.destroy', $multiple_frame->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button class="btn btn-danger btn-xs"type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
    </form>
    <a class="btn btn-warning btn-xs" href="{{ route('multiple_frames.edit', $multiple_frame->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
  </div>
  @endforeach
</div>
