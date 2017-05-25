<div class="row">
  @foreach($section->multiple_frames as $multiple_frame)
  <div class="col-xs-11">
    <img class="img-responsive" src="{{ $multiple_frame->path }}" alt="{{ $section->title }}">
  </div>
  <div class="col-xs-1">
    @include('options._multiple_frame')
  </div>
  @endforeach
</div>
