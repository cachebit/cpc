@extends('story')
@section('title', $story->title)

@section('content')
<div class="row">
  @if(count($story->sections))
  <div class="panel panel-default">
    <div class="panel-heading">
      <ul class="list-inline">
        <li><h3>章节故事</h3></li>
        <li><a class="btn btn-default btn-xs" href="{{ route('sections.create') }}">添加</a></li>
      </ul>
    </div>
    <div class="panel-body">
      @if($story->current_volum)
      <div class="row">
        @foreach($story->volums as $volum)
        <div class="col-xs-6 col-md-4">
          <div class="thumbnail">
            <img src="{{ $volum->covers()->first()->cover_m }}" alt="{{ $volum->title }}的封面">
            <div class="caption">
              <ul class="list-inline">
                <li><h3>{{ $volum->title }}</h3></li>
                <li><a class="btn btn-default btn-xs" href="{{ route('volums.edit', $volum->id) }}">编辑</a></li>
              </ul>

              <p>{{ $volum->description }}</p>
              <ul class="list-unstyled">
                @foreach($story->sections()->where('volum', $volum->volum)->orderBy('created_at', 'desc')->get() as $section)
                <li><a href="{{ route('sections.show',['stories' => $story->id ,'sections' => $section->id]) }}">{{ $section->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @else
      <ul class="list-unstyled">
        @foreach($story->sections as $section)
        <li><a href="{{ route('sections.show',['stories' => $story->id ,'sections' => $section->id]) }}">{{ $section->title }}</a></li>
        @endforeach
      </ul>
      @endif
    </div>
  </div>

  @endif

  @if(count($story->posters))
    <ul class="list-inline">
      <li><h3>最新海报</h3></li>
      <li><a class="btn btn-default btn-xs" href="#">添加</a></li>
      <li><a href="#">查看全部</a></li>
    </ul>

    <hr>
    @foreach($story->posters as $poster)
    <div class="col-xs-4 col-md-3">
      <ul class="list-inline">
        @if(Auth::check() and $story->is_author(Auth::id()))
        <li>
          <form class="" action="{{ route('posters.destroy') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger btn-xs pull-right" type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          </form>
        </li>
        @endif
        <li><a href="{{ route('posters.show' $poster->id) }}"><img class="img-responsive thumbnail" src="{{ $poster->path_s }}" alt="{{ $poster->title }}"></a></li>
      </ul>
    </div>
    @endforeach
  @endif



  @if(Auth::check() and Auth::user()->id === $story->user->id)
  @include('stories._create_content')
  @endif
</div>
@stop
