<div class="col-md-8">
  <h5>>推荐内容 <small>PROMOTE CONTENTS</small></h5>
  @foreach($promotes as $promote)
  <div class="jumbotron">
    <h1>{{ $promote->title }}</h1>
    <p>{{ $promote->description }}</p>
    <p><a class="btn btn-primary btn-lg" href="{{ route('stories.show', $promote->id) }}" role="button">点击查看</a></p>
  </div>
  @endforeach
</div>
