<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Opuscule;

class OpusculesController extends WorksController
{
  public function index()
  {
    $works = Opuscule::orderBy('created_at', 'desc')
                          ->paginate(10);
    $type = 'opuscules';
    return view('works.index',compact('works', 'type'));
  }

  public function show($id)
  {
    $works = Opuscule::findOrFail($id);
    $type = 'opuscules';
    return view('works.show',compact('works', 'type'));
  }

  public function create()
  {
    return view('works.create',['type' => 'opuscules']);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'title' => 'required',
      'genre' => 'required',
    ]);

    $opuscule = Opuscule::create([
      'title' => $request->title,
      'genre' => $request->genre,
      'user_id'=> Auth::user()->id,
      'score' => '0',
      'scored' => false,
    ]);

    $function = $opuscule->genre;

    return parent::$function($opuscule);
  }

  public function edit($id)
  {
    $work = Opuscule::findOrFail($id);
    $type = 'opuscules';
    return view('works.edit',compact('work', 'type'));
  }

  public function update($id, Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
    ]);

    $opuscule = Opuscule::findOrFail($id);
    $opuscule->update([
        'title' => $request->title,
    ]);

    return redirect()->route('opuscules.show', $id);
  }

  public function destroy($id)
  {
    $work = Opuscule::findOrFail($id);
    $genres = $work->genre;
    foreach($work->$genres as $genre)
    {
      $genre->delete();
    }
    $work->delete();
    return back();
  }

}
