@extends('layouts.default')
@section('title' ,'index')

@section('content')
<div class="col-sm-3">

</div>
<div class="col-sm-9">
  @if(count($works))
    <table class="table">
      <thead>
        <th>title</th>
        <th>author</th>
        <th>Created at</th>
      </thead>
      <tbody>
        @foreach($works as $work)
          <tr>
            <td>
              【<a href="{{ route($work->genre.'.index') }}" target="_blank">
                {{ $work->genre }}
              </a>】

              <a href="{{ route($type.'.show', $work->id) }}" target="_blank">
                {{ $work->section or $work->title }}
              </a>

              @if(Auth::user()->id === $work->user_id || $work->user_id === 0)
                <form class="pull-right" action="{{ route($type.'.destroy', $work->id) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="hidden" name="id" value="{{ $work->id }}">
                  <button class="btn btn-danger btn-xs" type="submit" name="button">delete</button>
                </form>
              @endif

            </td>
            <td>
              <a href="{{ route('users.show', $work->user_id) }}" target="_blank">
                {{ $work->user->name }}
              </a>
            </td>
            <td>
              {{ $work->created_at->diffForHumans() }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!! $works->render() !!}
  @else
    <p>no content</p>
  @endif
</div>

@stop
