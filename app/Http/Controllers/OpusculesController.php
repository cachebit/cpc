<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Opuscule;

class OpusculesController extends WorksController
{

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


}
