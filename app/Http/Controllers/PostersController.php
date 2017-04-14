<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Poster;

class PostersController extends WorksController
{

  public function index()
  {
    $works = Poster::orderBy('created_at', 'desc')
                          ->paginate(10);
    $type = 'posters';
    return view('works.index',compact('works', 'type'));
  }

  public function show($id)
  {
    $works = Poster::findOrFail($id);
    $type = 'posters';
    return view('works.show',compact('works', 'type'));
  }

  public function create()
  {
    return view('works.create',['type' => 'posters']);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'title' => 'required',
      'genre' => 'required',
    ]);

    $poster = Poster::create([
      'title' => $request->title,
      'genre' => $request->genre,
      'user_id'=> Auth::user()->id,
      'score' => '0',
      'scored' => false,
    ]);

    $function = $poster->genre;

    return parent::$function($poster);
  }

  public function edit($id)
  {
    $work = Poster::findOrFail($id);
    $type = 'posters';
    return view('works.edit',compact('work', 'type'));
  }

  public function update($id, Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
    ]);

    $work = Poster::findOrFail($id);
    $work->update([
        'title' => $request->title,
    ]);

    return redirect()->route('posters.show', $id);
  }

  public function destroy($id)
  {
      $work = Poster::findOrFail($id);
      $genres = $work->genre;
      foreach($work->$genres as $genre)
      {
        $genre->delete();
      }
      $work->delete();
      return back();
  }

}
