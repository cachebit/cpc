<header>
  <ul class="list-inline">
    <li><a href="{{ route('home') }}"><h1>漫侣！ - CPComic!<small>无CP 不漫画！╮(￣▽￣)╭</small></h1></a></li>
    <li class=" pull-right">
      <ul class="nav nav-pills">
        @if (Auth::check())
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}<b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('users.show', Auth::user()->id) }}">个人信息</a></li>
            <li><a href="{{ route('users.stories', Auth::id()) }}">作品管理</a></li>
            <li class="divider"></li>
            <li>
              <a href="#">
                <form action="{{ route('signout') }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-block" name="button">登出</button>
                </form>
              </a>
            </li>
          </ul>
        </li>
        <li><a href="{{ route('users.index') }}">所有用户</a></li>
        <li><a class="btn btn-success btn-sm" href="{{ route('create') }}">上传作品</a></li>
        @else
        <li><a href="{{ route('signin') }}">登录</a></li>
        <li><a href="{{ route('signup') }}">注册</a></li>
        @endif
      </ul>
    </li>
  </ul>
</header>
