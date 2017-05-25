@if(count($section->texts))
<div class="row">
  <div class="col-xs-11">
    <p>{{ $section->texts()->first()->body }}</p>
  </div>
  <div class="col-xs-1">
    @include('options._text')
  </div>
</div>
@else
<p class="text-center">-未更新文字-</p>
@endif
