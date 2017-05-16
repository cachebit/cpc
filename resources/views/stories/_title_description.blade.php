<ul class="list-unstyled">
  <li>
    <ul class="list-inline">
      <li><a href="{{ route('stories.show', $story->id) }}"><h3>{{ $story->title }}</h3></a></li>
      @unless($story->type === '')
      <li><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <a href="#">{{ $story->type }}</a></li>
      @endunless
    </ul>
  </li>

  <li>
    <ul class="list-inline">
      <li>作者：<a href="{{ route('users.show', $story->user->id) }}">{{ $story->user->name }}</a></li>
      <li>@include('stories._options')</li>
    </ul>
  </li>
  @if(count($story->covers))
  <li><img class="img-responsive thumbnail" src="{{ $story->covers()->first()->cover_m }}" alt="《{{ $story->title }}》的封面"></li>
  @endif
  <li><p>{{ $story->description }}</p></li>
</ul>
