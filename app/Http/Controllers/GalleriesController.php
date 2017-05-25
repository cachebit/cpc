<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Scorable;
use App\Gallery;
use Auth;

class GalleriesController extends Controller
{
  public function show(Gallery $gallery)
  {
    return view('show.gallery', compact('gallery'));
  }

  public function score(Request $request, Gallery $gallery)
  {
    $this->validate($request,[
      'score' => 'required|integer|min:1|max:15',
    ]);

    $s = $request->score;
    //引入公式了，翻看当时的笔记。
  }
}
