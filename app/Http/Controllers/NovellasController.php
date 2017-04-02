<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Novella;

class NovellasController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'novellas']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'section' => 'required',
        'genre' => 'required'
      ]);

      $request['user_id'] = Auth::user()->id;
      $request['score'] = 0;
      $request['scored'] = false;
      $request['published_at'] = Carbon::now();

      App\Novella::create([$request]);

      return redirect()->route($request->genre.'.create',[$request]);
    }

}
