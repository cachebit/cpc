@if(Auth::check() and $sketch->is_author(Auth::id()))
<form class="" action="{{ route('sketches.destroy', $sketch->id) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button class="btn btn-danger btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
</form>
<a class="btn btn-warning btn-xs" href="{{ route('sketches.edit', $sketch->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
@endif
