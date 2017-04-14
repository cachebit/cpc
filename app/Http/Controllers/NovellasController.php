<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Novella;

class NovellasController extends WorksController
{

  public function index()
  {
    $works = Novella::orderBy('created_at', 'desc')
                          ->paginate(10);
    $type = 'novellas';
    return view('works.index',compact('works', 'type'));
  }

  public function show($id)
  {
    $works = Novella::findOrFail($id);
    $type = 'novellas';
    return view('works.show',compact('works', 'type'));
  }

  public function create()
  {
    return view('works.create',['type' => 'novellas']);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'title' => 'required',
      'section' => 'required',
      'genre' => 'required',
    ]);

    $novella = Novella::create([
      'title' => $request->title,
      'section' => $request->section,
      'genre' => $request->genre,
      'user_id'=> Auth::user()->id,
      'score' => '0',
      'scored' => false,
    ]);

    $function = $novella->genre;

    return parent::$function($novella);
  }


}
