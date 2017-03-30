<li>
  <div class="row">
    <div class="col-xs-4">
      <a href="{{ route('users.show', $user->id) }}">
        <img class="img-responsive" src="{{ $user->portrait_path }}" alt="{{ $user->name }}">
      </a>
    </div>
    <div class="col-xs-8">
      <p><b>UID: </b>{{ $user->id }}</p>
      <p><b>{{ $user->character }}: </b><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></p>
      <p><b>psg: </b>{{ $user->prestige }}</p>
      <p><b>exp: </b>{{ $user->experience }}</p>
      <p><b>activated: </b>{{ $user->activated }}</p>
    </div>
  </div>
</li>
