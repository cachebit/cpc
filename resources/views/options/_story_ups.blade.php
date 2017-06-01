<ul class="list-inline">
  <li> {{ $story->up }}人喜欢</li>
  <li>
    @if(Auth::check())
      @if( $story->user_uped( Auth::id() ) )
      <form action="{{ route('stories.down', $story->id) }}" method="post">
        {{ csrf_field() }}

        <button class="btn btn-default btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
      </form>
      @else
      <form action="{{ route('stories.up', $story->id) }}" method="post">
        {{ csrf_field() }}

        <button class="btn btn-default btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></button>
      </form>
      @endif
    @endif
  </li>
</ul>
