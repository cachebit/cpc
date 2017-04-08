<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Novel;

class NovelsController extends WorksController
{
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
