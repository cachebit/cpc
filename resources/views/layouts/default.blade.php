<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'CPComic!') - CPComic!</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src="/js/bootstrap.js"></script>
  </head>
  <body>
    <div class="container">
      @include('shared._header')
      @include('shared._nav')
      @yield('content')
      @include('shared._footer')
    </div>
  </body>
</html>
