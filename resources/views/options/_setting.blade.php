@if(Auth::check() and $setting->is_author(Auth::id()))
<form class="" action="{{ route('settings.destroy', $setting->id) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button class="btn btn-danger btn-xs" type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
</form>
<a class="btn btn-warning btn-xs" href="{{ route('settings.edit', $setting->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
@endif
