<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Opuscule;

class OpusculesController extends Controller
{

    public function create()
    {
      return view('works.create', ['type' => 'opuscules']);
    }

    public function genre()
    {

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

      return $this->$function($opuscule);
    }

    public function webtoons(Opuscule $type)
    {
      return 'opuscle webtoon function';
    }

}
