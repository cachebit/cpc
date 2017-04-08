<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Poster;

class PostersController extends WorksController
{
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

}
