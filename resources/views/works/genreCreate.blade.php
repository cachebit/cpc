@extend('layouts.default')
@section('title', $genre.' generator')

@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>{{ $genre.' generator' }}</h5>
      </div>
      <div class="panel-body">
        @include('shared.errors')

        <p>{{ $title }}</p>
        <form method="post" action="{{ route($genre.'.store') }}">
          {{ csrf_field() }}

          @if

          <button class="btn btn-primary pull-right" genre="submit" name="button">submit</button>
        </form>

      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>FAQ:</h5>
      </div>
      <div class="panel-body">
        <dl class="well">
          <dt>Q: How are you?</dt>
          <dd>
            I'm find! Thank you!
          </dd>
        </dl>
      </div>
    </div>
  </div>

</div>
@stop
