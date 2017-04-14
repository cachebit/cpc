<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Novel;

class NovelsController extends WorksController
{

  public function index()
  {
    $works = Novel::orderBy('created_at', 'desc')
                          ->paginate(10);
    $type = 'novels';
    return view('works.index',compact('works', 'type'));
  }

  public function show($id)
  {
    $works = Novel::findOrFail($id);
    $type = 'novels';
    return view('works.show',compact('works', 'type'));
  }

  public function create()
  {
    return view('works.create',['type' => 'novels']);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'title' => 'required',
      'volum' => 'required',
      'section' => 'required',
      'genre' => 'required',
    ]);

    $novel = Novel::create([
      'title' => $request->title,
      'volum'=> $request->volum,
      'section' => $request->section,
      'genre' => $request->genre,
      'user_id'=> Auth::user()->id,
      'score' => '0',
      'scored' => false,
    ]);

    $function = $novel->genre;

    return parent::$function($novel);
  }

}
