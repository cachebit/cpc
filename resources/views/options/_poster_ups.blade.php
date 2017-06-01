<ul class="list-inline">
  <li> {{ $poster->up }}人喜欢</li>
  <li>
    @if(Auth::check())
      @if( $poster->user_uped( Auth::id() ) )
      <form action="{{ route('posters.down', $poster->id) }}" method="post">
        {{ csrf_field() }}

        <button class="btn btn-default btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
      </form>
      @else
      <form action="{{ route('posters.up', $poster->id) }}" method="post">
        {{ csrf_field() }}

        <button class="btn btn-default btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></button>
      </form>
      @endif
    @endif
  </li>
</ul>
