<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title', 'CPComic!') - CPComic!</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 http://www.bootcdn.cn/ -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <!-- 最新版本的 jquery 文件 http://www.bootcdn.cn/ -->
    <script src="//cdn.bootcss.com/jquery/3.1.1/jquery.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 http://www.bootcdn.cn/ -->
    <script src="/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      @include('layouts._header')
      @include('layouts._nav')
      @include('layouts._login_user',['user' => Auth::user()])
      <div class="row">
        @include('shared.messages')
        <div class="col-md-3">
          @include('show._story_info')
        </div>
        <div class="col-md-9">
          @yield('content')
        </div>
      </div>
      @include('layouts._footer')
    </div>
  </body>
</html>
