@if(count($sketch->galleries))
  @if($sketch->galleries->first()->scorable)
    @if(Auth::check())
      @if($sketch->is_author(Auth::id()))
        <p>如无人评分，可撤展。</p>
      @else
        <p>去评分</p>
      @endif
    @else
    <a class="btn btn-default btn-xs" href="{{ route('galleries.show', $sketch->galleries->first()->id) }}">
      <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
      展示中 去评分！
    </a>
    @endif
  @else
  <p>展览得分：{{ $sketch->score }}分。</p>
  @endif
@else
  @if(Auth::check())
    @if($sketch->is_author(Auth::id()))
    <form action="{{ route('sketches.gallery', $sketch->id) }}" method="post">
      {{ csrf_field() }}

      <button class="btn btn-info btn-xs" type="submit" name="button">入展</button>
    </form>
    @else
    <p>未入展，UP一下支持作者入展。</p>
    @endif
  @else
  <p>未入展，<a href="#">登录</a>点赞，支持入展。没有帐号？立即<a href="#">注册</a>。</p>
  @endif
@endif
