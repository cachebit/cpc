@if(Auth::check() and $section->texts()->first()->is_author(Auth::id()))
<form action="{{ route('texts.destroy', $section->texts()->first()->id) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button class="btn btn-danger btn-xs"type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
</form>
<a class="btn btn-warning btn-xs" href="{{ route('texts.edit', $section->texts()->first()->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
@endif
