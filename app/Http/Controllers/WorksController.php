<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class WorksController extends Controller
{

    public function start()
    {
        return view('works.start');
    }

    public function distribute(Request $request)
    {
      $this->validate($request, [
        'type' => 'required',
      ]);
      return redirect()->route($request->type.'.create');
    }

}
