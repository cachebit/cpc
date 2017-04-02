<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Sketch;

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

      $request['user_id'] = Auth::user()->id;
      $request['score'] = 0;
      $request['scored'] = false;
      $request['published_at'] = Carbon::now();

      App\Sketch::create([$request]);

      return redirect()->route($request->genre.'.create',[$request]);
    }


}
