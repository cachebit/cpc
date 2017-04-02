<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class OpusculesController extends Controller
{

    public function create()
    {
      return view('works.create', ['type' => 'opuscules']);
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
