<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Sketch;
use App\SingleFrame;

class SketchesController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'sketches']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'genre' => 'required',
      ]);

      $sketch = Sketch::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      $function = $sketch->genre;

      return $this->$function($sketch);
    }

    public function single_frames(Sketch $sketch)
    {
      $single_frame = new SingleFrame([
        'user_id' => $sketch->user_id,
        'path' => 'image path',
      ]);

      $sketch->single_frames()->save($single_frame);

      return redirect()->route('single_frames.edit', $single_frame->id);
    }

}
