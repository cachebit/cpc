<div class="row">
  @foreach($section->webtoons as $webtoon)
  <div class="col-xs-11">
    <img class="img-responsive" src="{{ $webtoon->path }}" alt="{{ $section->title }}">
  </div>
  <div class="col-xs-1">
    <form action="{{ route('webtoons.destroy', $webtoon->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button class="btn btn-danger btn-xs"type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
    </form>
    <a class="btn btn-warning btn-xs" href="{{ route('webtoons.edit', $webtoon->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
  </div>
  @endforeach
</div>
