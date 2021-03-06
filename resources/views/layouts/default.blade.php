<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'CPComic!') - CPComic!</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 http://www.bootcdn.cn/ -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- 最新版本的 jquery 文件 http://www.bootcdn.cn/ -->
    <script src="//cdn.bootcss.com/jquery/3.1.1/jquery.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 http://www.bootcdn.cn/ -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      @include('layouts._header')
      @include('layouts._nav')
      <div class="row">
        @include('shared.messages')
        <div class="col-sm-9">
          @yield('content')
        </div>
        <div class="col-sm-3">
          @if (Auth::check())
            @include('layouts._right_column')
          @endif
        </div>
      </div>
      @include('layouts._footer')
    </div>
  </body>
</html>
