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

      $poster = Poster::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      return redirect()->route('posetrs.show',$poster->id);
    }

    public function show($id)
    {
      $request = Poster::findOrFail($id);

      return view('works.show',compact('request'));
    }


}
