<div class="col-md-8">
  <h5>最新设定</h5>
  @if(count($lastests))
   @foreach($lastests as $setting)
   <div class="row">
     <div class="col-xs-3">
       <img class="img-responsive" src="{{ $setting->path_s }}">
     </div>
     <div class="col-xs-9">
       <h4>{{ $setting->title }}</h4>
       <p>{{ $setting->description }}</p>
     </div>
   </div>
   @endforeach
  @endif
</div>
