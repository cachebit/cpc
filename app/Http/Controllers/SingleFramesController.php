<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SingleFrame;

class SingleFramesController extends Controller
{

  public function edit($id)
  {
    $genre = SingleFrame::findOrFail($id);

    return view('works.genre_edit',compact('genre'));
  }

  public function update(Request $request)
  {
    $this->validate($request,[
      'id' => 'required',
      'image' => 'required|image'
    ]);

    $singel_frame = SingleFrame::findOrFail($request->id);
    $singel_frame->update([
      'path' => $request->path,
    ]);

    return redirect()->route('single_frames.show', $request->id);
  }

  public function show($id)
  {
    $genre = SingleFrame::findOrFail($id);
    return view('works.genre_show',compact('genre'));
  }

}
