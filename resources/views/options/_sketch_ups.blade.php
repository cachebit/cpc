<ul class="list-inline">
  <li> {{ $sketch->up }}人喜欢</li>
  <li>
    @if(Auth::check())
      @if( $sketch->user_uped( Auth::id() ) )
      <form action="{{ route('sketches.down', $sketch->id) }}" method="post">
        {{ csrf_field() }}

        <button class="btn btn-default btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
      </form>
      @else
      <form action="{{ route('sketches.up', $sketch->id) }}" method="post">
        {{ csrf_field() }}

        <button class="btn btn-default btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></button>
      </form>
      @endif
    @endif
  </li>
</ul>
