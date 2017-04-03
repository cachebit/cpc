<h1 class="text-center">{{ $genre->imageable->title }}</h1>

@if($genre->imageable->volum)
<h2 class="text-center">{{ $genre->imageable->volum }}</h2>
@endif

@if($genre->imageable->section)
<h3 class="text-center">{{ $genre->imageable->section }}</h3>
@endif
