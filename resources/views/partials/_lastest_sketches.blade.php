<div class="col-md-8">
  <h5>最新草图</h5>
  @if(count($lastests))
   @foreach($lastests as $sketch)
   <div class="row">
     <div class="col-xs-3">
       <img class="img-responsive" src="{{ $sketch->path_s }}">
     </div>
     <div class="col-xs-9">
       <h4>{{ $sketch->title }}</h4>
       <p>{{ $sketch->description }}</p>
     </div>
   </div>
   @endforeach
  @endif
</div>
