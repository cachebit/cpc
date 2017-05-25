@if(count($section->texts))
<div class="row">
  <div class="col-xs-11">
    <p>{{ $section->texts()->first()->body }}</p>
  </div>
  <div class="col-xs-1">
    <form action="{{ route('texts.destroy', $section->texts()->first()->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

      <button class="btn btn-danger btn-xs"type="submit" name="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
    </form>
    <a class="btn btn-warning btn-xs" href="{{ route('texts.edit', $section->texts()->first()->id) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
  </div>
</div>
@else
<p class="text-center">-未更新文字-</p>
@endif
