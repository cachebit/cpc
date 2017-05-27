<div class="col-md-8">
  <h5>>>最新设定 <small>LASTEST SETTINGS</small></h5>
  @if(count($promotes))
   <div class="row">
    @foreach($promotes as $setting)
     <div class="col-xs-6 col-sm-4">
       <div class="thumbnail">
         <a href="{{ route('settings.show', $setting->id) }}">
           <img class="img-responsive" src="{{ $setting->path_s }}">
         </a>
         <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
         <a href="{{ route('users.show' ,$setting->get_user()->id) }}">
           {{ substr($setting->get_user()->name, 0, 8) }}
         </a>
       </div>
     </div>
     @endforeach
   </div>
  @endif
</div>
