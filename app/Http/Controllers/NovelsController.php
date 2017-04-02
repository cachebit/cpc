<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Novel;

class NovelsController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'novels']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'volum' => 'required',
        'section' => 'required',
        'genre' => 'required',
        'user_id' => 'required'
      ]);

      Novel::create([$request]);

      return redirect()->route($request->genre.'.create',[$request]);
    }


}
