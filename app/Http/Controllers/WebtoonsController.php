<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Webtoon;
use Input;

class WebtoonsController extends Controller
{
  public function edit($id)
  {
    $genre = Webtoon::findOrFail($id);

    return view('works.genre_edit',compact('genre'));
  }

  public function update(Request $request)
  {
    $this->validate($request,[
      'id' => 'required',
      'image' => 'required'
    ]);

    $webtoon = Webtoon::findOrFail($request->id);
    $webtoon->update([
      'path' => $request->image,
    ]);

    return redirect()->route('webtoons.show', $request->id);
  }

  public function show($id)
  {
    $genre = Webtoon::findOrFail($id);
    return view('works.genre_show',compact('genre'));
  }
}
