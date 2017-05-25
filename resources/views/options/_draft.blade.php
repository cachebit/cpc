@if(Auth::check() and $draft->is_author(Auth::id()))
<form class="" action="{{ route('drafts.destroy', $draft->id) }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button class="btn btn-danger btn-xs" type="submit" name="button">删除</span></button>
  <a class="btn btn-warning btn-xs" href="{{ route('drafts.destroy', $draft->id) }}">编辑</a>
</form>
@endif
