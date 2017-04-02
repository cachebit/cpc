<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SketchesController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'sketches']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'genre' => 'required'
      ]);
      return redirect()->route($request->genre.'.create',[$request]);
    }

    
}
