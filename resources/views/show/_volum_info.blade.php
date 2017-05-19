<div class="thumbnail">
  @if(count($volum->covers))
  <a href="{{ route('volums.show', $volum->id) }}">
    <img class="img-responsive" src="{{ $volum->covers()->first()->cover_m }}" alt="{{ $volum->title }}">
  </a>
  @endif
  <div class="caption">
    <ul class="list-inline">
      <li><h4>{{ $volum->title }}</h4></li>
      <li>@include('options._volum')</li>
    </ul>
    <p>{{ $volum->description }}</p>
    @if(count($volum->sections))
    <ul class="list-unstyled">
      @foreach($volum->sections()->get() as $section)
      <li>
        <a href="{{ route('sections.show', [
        'stories' => $volum->story->id,
        'sections' => $section->id
        ]) }}">
          {{ $section->title }}
        </a>
      </li>
      @endforeach
    </ul>
    @else
    <p>-未更新章节-<a class="btn btn-default pull-right" href="{{ route('sections.create_in_volum', $volum->id) }}">立即更新</a></p>
    @endif
  </div>
</div>
