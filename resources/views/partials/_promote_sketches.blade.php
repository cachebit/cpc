<div class="col-md-8">
  <h5>>>最新摸鱼 <small>LASTEST SKETCHES</small></h5>
  @if(count($promotes))
   <div class="row">
    @foreach($promotes as $sketch)
     <div class="col-xs-6 col-sm-4">
       <div class="thumbnail">
         <a href="{{ route('sketches.show', $sketch->id) }}">
           <img class="img-responsive" src="{{ $sketch->path_s }}">
         </a>
         <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
         <a href="{{ route('users.show' ,$sketch->get_user()->id) }}">
           {{ substr($sketch->get_user()->name, 0, 8) }}
         </a>
       </div>
     </div>
     @endforeach
   </div>
  @endif
</div>
