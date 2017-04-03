<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MultipleFrame;

class MultipleFramesController extends Controller
{

  public function edit($id)
  {
    $genre = MultipleFrame::findOrFail($id);

    return view('works.genre_edit',compact('genre'));
  }

  public function update(Request $request)
  {

    $this->validate($request,[
      'id' => 'required',
      'path' => 'required|min:1'
    ]);

    $multiple_frame = MultipleFrame::findOrFail($request->id);
    $multiple_frame->update([
      'path' => $request->path,
    ]);

    return redirect()->route('multiple_frames.show', $request->id);
  }

  public function show($id)
  {
    $genre = MultipleFrame::findOrFail($id);
    return view('works.genre_show',compact('genre'));
  }
}
