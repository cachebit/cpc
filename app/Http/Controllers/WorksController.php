<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class WorksController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        return view('works.start');
    }

    public function create(Request $request)
    {
      $this->validate($request, [
        'type' => 'required',
        'genre' => 'required'
      ]);

      if($request->type === 'opuscule'){

        return view('opuscule.create');

      } elseif($request->type === 'novella'){

        return view('novella.create');

      } elseif($request->type === 'novel'){

        return view('novel.create');

      } elseif($request->type === 'poster'){

        return view('poster.create');

      } elseif($request->type === 'sketch'){

        return view('sketch.create');

      } elseif($request->type === 'draft'){

        return view('draft.create');

      } elseif($request->type === 'setting'){
        return view('setting.create');
      }
    }

}
