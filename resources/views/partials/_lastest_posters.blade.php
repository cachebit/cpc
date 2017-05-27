<div class="col-md-8">
  <h5>最新海报</h5>
  @if(count($lastests))
   @foreach($lastests as $poster)
   <div class="row">
     <div class="col-xs-3">
       <img class="img-responsive" src="{{ $poster->path_s }}">
     </div>
     <div class="col-xs-9">
       <h4>{{ $poster->title }}</h4>
       <p>{{ $poster->description }}</p>
     </div>
   </div>
   @endforeach
  @endif
</div>
