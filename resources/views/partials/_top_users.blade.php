<div class="col-md-4">
  <h5>>>审美大侠榜 <small>AESTHETIC RANKING LIST</small></h5>
  <div class="row">
    @foreach($users as $user)
    <div class="col-xs-2 col-md-4">
      <div class="thumbnail">
        <a href="{{ route('users.show', $user->id) }}">
          <img class="img-responsive" src="{{ $user->portrait }}">
        </a>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        <a href="{{ route('users.show', $user->id) }}">
        {{ substr($user->name, 0 , 5) }}
        </a>
        {{ $user->aesthetic }}
      </div>
    </div>
    @endforeach
  </div>
</div>
