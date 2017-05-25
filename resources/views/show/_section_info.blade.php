<div class="thumbnail">
  @if(count($section->covers))
  <a href="{{ route('sections.show', $section->id) }}">
    <img class="img-responsive" src="{{ $section->covers()->first()->cover_m }}" alt="{{ $section->title }}">
  </a>
  @endif
  <div class="caption">
    <ul class="list-inline">
      <li>
        <a href="{{ route('sections.show', $section->id) }}">
          <h4>{{ $section->title }}</h4>
        </a>
      </li>
      <li>@include('sections._options')</li>
      <li>发表于：{{ $section->created_at->diffForHumans() }}</li>
    </ul>
    <p class="text-muted">{{ $section->description }}</p>
    <ul class="list-unstyled">
      <p>-未更新内容-</p>
    </ul>
  </div>
</div>
