<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Draft;

class DraftsController extends WorksController
{

  public function index()
  {
    $works = Draft::orderBy('created_at', 'desc')
                          ->paginate(10);
    $type = 'drafts';
    return view('works.index',compact('works', 'type'));
  }

  public function show($id)
  {
    $works = Draft::findOrFail($id);
    $type = 'drafts';
    return view('works.show',compact('works', 'type'));
  }

  public function create()
  {
    return view('works.create',['type' => 'drafts']);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'title' => 'required',
      'genre' => 'required',
    ]);

    $draft = Draft::create([
      'title' => $request->title,
      'genre' => $request->genre,
      'user_id'=> Auth::user()->id,
      'score' => '0',
      'scored' => false,
    ]);

    $function = $draft->genre;

    return parent::$function($draft);
  }

  public function edit($id)
  {
    $work = Draft::findOrFail($id);
    $type = 'drafts';
    return view('works.edit',compact('work', 'type'));
  }

  public function update($id, Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
    ]);

    $work = Draft::findOrFail($id);
    $work->update([
        'title' => $request->title,
    ]);

    return redirect()->route('drafts.show', $id);
  }

  public function destroy($id)
  {
      $work = Draft::findOrFail($id);
      $genres = $work->genre;
      foreach($work->$genres as $genre)
      {
        $genre->delete();
      }
      $work->delete();
      return back();
  }

}
