<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class WebtoonsController extends Controller
{

  public function create($id)
  {
    return view('works.genre_create',compact('request'));
  }


  public function store(Request $request)
  {
    dd($request);
      return ;
  }

  public function edit($id)
  {
    return 'webtoons edit';
  }


}
