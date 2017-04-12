<div class="panel panel-default">
  <div class="panel-heading">
    <h5>{{ $user->name }}'s info</h5>
  </div>
  <div class="panel-body">
    <img class="img-responsive" src="{{ $user->portrait_path }}" alt="{{ $user->name }}">
    <p><a href="#">{{ $user->name }}</a></p>
    <dl>
      <dt>prestige:</dt>
      <dd>{{ $user->prestige }}</dd>
      <dt>experience:</dt>
      <dd>{{ $user->experience }}</dd>
    </dl>
  </div>
  <div class="panel-footer">

  </div>
</div>
