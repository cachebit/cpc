<h1 class="text-center">{{ $request->title }}</h1>

@if($request->has('volum'))
<h2 class="text-center">{{ $request->volum }}</h2>
@endif

@if($request->has('section'))
<h3 class="text-center">{{ $request->section }}</h3>
@endif
