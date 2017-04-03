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
        'genre' => 'required',
      ]);

      $novella = Novella::create([
        'title' => $request->title,
        'section' => $request->section,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      return redirect()->route('novells.show',$novella->id);
    }

    public function show($id)
    {
      $request = Novella::findOrFail($id);

      return view('works.show',compact('request'));
    }

}
