<ul class="list-inline">
  <li>
    @if(count($section->ups))
    <form action="{{ route('stories.down', $section->id) }}" method="post">
      {{ csrf_field() }}

      <button class="btn btn-default btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
    </form>
    @else
    <form action="{{ route('stories.up', $section->id) }}" method="post">
      {{ csrf_field() }}

      <button class="btn btn-default btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></button>
    </form>
    @endif
  </li>
  <li><span class="glyphicon glyphicon-share" aria-hidden="true"></span></li>
</ul>
