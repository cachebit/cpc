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
      ]);

      $novel = Novel::create([
        'title' => $request->title,
        'volum'=> $request->volum,
        'section' => $request->section,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      return redirect()->route('novels.show',$novel->id);
    }

    public function show($id)
    {
      $request = Novel::findOrFail($id);

      return view('works.show',compact('request'));
    }


}
