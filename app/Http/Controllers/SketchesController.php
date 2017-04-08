<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Sketch;

class SketchesController extends WorksController
{
  public function create()
  {
    return view('works.create',['type' => 'sketches']);
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

    return parent::$function($sketch);
  }

}
