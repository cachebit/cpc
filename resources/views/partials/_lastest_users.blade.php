<div class="col-md-4">
  <h5>>>新加入会员 <small>LASTEST NEWBIES</small></h5>
  <div class="row">
    @foreach($users as $user)
    <div class="col-xs-2 col-md-3">
      <div class="thumbnail">
        <a href="{{ route('users.show', $user->id) }}">
          <img class="img-responsive" src="{{ $user->portrait }}">
        </a>
      </div>
    </div>
    @endforeach
  </div>
</div>
