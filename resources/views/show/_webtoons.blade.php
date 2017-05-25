<div class="row">
  @foreach($section->webtoons as $webtoon)
  <div class="col-xs-11">
    <img class="img-responsive" src="{{ $webtoon->path }}" alt="{{ $section->title }}">
  </div>
  <div class="col-xs-1">
    @include('options._webtoon')
  </div>
  @endforeach
</div>
