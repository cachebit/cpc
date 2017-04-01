<h1 class="text-center">{{ $request->title }}</h1>

@if($request->has('volum'))
<h2 class="text-center">{{ $request->volum }}</h2>
@endif

@if($request->has('section'))
<h3 class="text-center">{{ $request->section }}</h3>
@endif

@if(Auth::check())
<h3 class="text-center">作者：<a href="{{ route('users.show',Auth::user()->id) }}">{{ Auth::user()->name }}</a></h3>
@endif
