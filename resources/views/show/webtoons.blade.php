@extends('app')
@section('title', count($webtoons)?$webtoons->first()->section->title:'未上传任何条漫')

@section('content')
<div class="col-md-9 col-md-push-3">
  <ul class="list-inline">
    <li><h4>{{ $webtoons->first()->section->title }}</h4></li>
    <li>
      @if(Auth::check() and Auth::user()->id === $webtoons->first()->section->story->user->id)
      <div class="dropdown">
        <button class="btn btn-default btn-xs" id="section_option" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          操作
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="section_option">

          @if($webtoons->first()->section->story->type === '')
          <li><a href="{{ route('sections.add', $webtoons->first()->section->id) }}">添加内容</a></li>
          @elseif($webtoons->first()->section->story->type === '条漫')
          <li><a href="{{ route('sections.webtoons', $webtoons->first()->section->id) }}">添加条漫</a></li>
          @elseif($webtoons->first()->section->story->type === '多格漫画')
          <a href="{{ route('sections.multiple_frames', $webtoons->first()->section->id) }}">添加多格漫画</a>
          @elseif($webtoons->first()->section->story->type === '剧本')
          <a href="{{ route('sections.texts', $webtoons->first()->section->id) }}">添加剧本</a>
          @endif

          <li><a href="{{ route('sections.edit', $webtoons->first()->section->id) }}">编辑标题或描述</a></li>

          <li class="divider"></li>
          <li>
            <form action="{{ route('sections.destroy', $webtoons->first()->section->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <button class="btn btn-danger btn-block btn-xs" type="submit" name="button">删除章节</button>
            </form>
          </li>
        </ul>
      </div>
      @endif

    </li>
  </ul>
  <p>{{ $webtoons->first()->section->description }}</p>

  <hr>
  <ul class="list-unstyled">
    @foreach($webtoons as $webtoon)
    <li>
      <div class="row">
        <div class="col-xs-11">
          <img class="img-responsive" src="{{ $webtoon->path }}" alt="{{ $webtoon->section->title }}">
        </div>
        @if(Auth::check() and Auth::user()->id === $webtoon->section->story->user->id)
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
</div>
<div class="col-md-3 col-md-pull-9">
  @include('stories._title_description',['story' => $webtoons->first()->section->story])
  <h3>所有章节</h3>
  <hr>
  <ul class="list-unstyled">
  @foreach($webtoons->first()->section->story->sections as $section)
    <li>
      <a href="{{ route('sections.show', $section->id) }}">
        {{ $section->title }}
      </a>
      <i class="pull-right text-muted">发表于：{{ $section->created_at->diffForHumans() }}</i>
    </li>
  @endforeach
  </ul>
</div>
@stop
