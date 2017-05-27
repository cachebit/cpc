<li>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-3">
          <a href="{{ route('users.show', $user->id) }}">
            <img class="img-responsive" src="{{ $user->portrait }}" alt="{{ $user->name }}">
          </a>
        </div>
        <div class="col-xs-5">
          <ul class="list-unstyled">
            <li><p><b>UID: </b>{{ $user->id }}</p></li>
            <li><p><b>{{ $user->title }}: </b><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></p></li>
            <li>
              <p>
                <b>状态: </b>
                @if($user->activated)
                激活
                @else
                未激活
                @endif
              </p>
            </li>
          </ul>
        </div>
        <div class="col-xs-4">
          <ul class="list-unstyled">
            <li><p><b>审美： </b>{{ $user->aesthetic }}</p></li>
            <li><p><b>阅历： </b>{{ $user->experience }}</p></li>
            <li><p><b>实践： </b>{{ $user->practice }}</p></li>
            <li><p><b>激情： </b>{{ $user->passion }}</p></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</li>
