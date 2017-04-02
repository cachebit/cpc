<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DraftsController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'drafts']);
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
      ]);
      return redirect()->route($request->genre.'.create',[$request]);
    }

}
