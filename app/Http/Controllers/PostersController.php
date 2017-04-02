<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Poster;

class PostersController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'posters']);
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

      App\Poster::create([$request]);

      return redirect()->route($request->genre.'.create',[$request]);
    }


}
