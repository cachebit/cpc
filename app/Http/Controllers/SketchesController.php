<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Sketch;

class SketchesController extends WorksController
{

  public function index()
  {
    $works = Sketch::orderBy('created_at', 'desc')
                          ->paginate(10);
    $type = 'sketches';
    return view('works.index',compact('works', 'type'));
  }

  public function show($id)
  {
    $works = Sketch::findOrFail($id);
    return view('works.show',compact('works'));
  }

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

  public function edit($id)
  {
    $work = Sketch::findOrFail($id);
    $type = 'sketches';
    return view('works.edit',compact('work', 'type'));
  }

  public function update($id, Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
    ]);

    $work = Sketch::findOrFail($id);
    $work->update([
        'title' => $request->title,
    ]);

    return redirect()->route('sketches.show', $id);
  }

  public function destroy($id)
  {
      $work = Sketch::findOrFail($id);
      $genres = $work->genre;
      foreach($work->$genres as $genre)
      {
        $genre->delete();
      }
      $work->delete();
      return back();
  }

}
