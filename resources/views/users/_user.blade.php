<li>
  <div class="row">
    <div class="col-xs-4">
      <a href="{{ route('users.show', Auth::user()->id) }}">
        <img class="img-responsive" src="{{ Auth::user()->portrait_path }}" alt="{{ Auth::user()->name }}">
      </a>
    </div>
    <div class="col-xs-8">
      <p><b>UID: </b>{{ Auth::user()->id }}</p>
      <p><b>{{ Auth::user()->character }}: </b><a href="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a></p>
      <p><b>psg: </b>{{ Auth::user()->prestige }}</p>
      <p><b>exp: </b>{{ Auth::user()->experience }}</p>
      <p><b>activated: </b>{{ Auth::user()->activated }}</p>
    </div>
  </div>
</li>
