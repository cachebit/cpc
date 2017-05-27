@extends('app')
@section('title', '公告牌')

@section('content')
  <div class="col-md-9">
    @include('shared.errors')
    <div class="thumbnail">
      <img class="img-responsive" src="{{ $gallery->get_img() }}" alt="{{ $gallery->get_title() }}">
      <div class="caption">
        @if(Auth::check() and !$gallery->is_author(Auth::id()))
        <h3>请给作品打分（1-15）</h3>
        <ul class="list-inline">
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="1">1</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="2">2</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="3">3</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="4">4</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="5">5</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="6">6</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="7">7</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="8">8</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="9">9</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="10">10</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="11">11</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="12">12</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="13">13</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="14">14</button>
            </form>
          </li>
          <li>
            <form action="{{ route('galleries.score', $gallery->id) }}" method="post">
              {{ csrf_field() }}

              <button class="btn btn-default btn-lg" type="submit" name="score" value="15">15</button>
            </form>
          </li>
        </ul>
        @endif
      </div>
    </div>
  </div>
@stop
