@if($section->story->type === '条漫')
<ul class="list-unstyled">
  @foreach($section->webtoons as $webtoon)
  <li>
    <div class="row">
      <div class="col-xs-11">
        <img class="img-responsive" src="{{ $webtoon->path }}" alt="{{ $section->title }}">
      </div>
      @if(Auth::check() and Auth::user()->id === $section->story->user->id)
      <div class="col-xs-1">
        <ul class="list-inline">
          <li>
            <form action="{{ route('webtoons.destroy', $webtoon->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <button class="btn btn-danger btn-xs" type="submit" name="button">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
              </button>
            </form>
          </li>
          <li>
            <a class="btn btn-warning btn-xs" href="{{ route('webtoons.edit', $webtoon->id) }}">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a>
          </li>
        </ul>

      </div>
      @endif
    </div>
  </li>
  @endforeach
</ul>
@elseif($section->story->type === '多格漫画')

@elseif($section->story->type === '剧本')

@elseif($section->story->type === '')
<p class="well">
  还没有更新任何内容。
  @if(Auth::check() and Auth::user()->id === $section->story->user->id)
  <h4>添加内容</h4>
  @include('sections._types_table')
  @endif
</p>
@endif
