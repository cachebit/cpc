<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Webtoon;
use App\Type;

class WebtoonsController extends Controller
{

  public function create(Type $type)
  {
    $webtoon = new Webtoon([
      'user_id' => $type->user_id,
      'path' => '',
    ]);
    dd($webtoon);
    $type->webtoons()->save($webtoon);

    return redirect()->route('webtoons.edit',$webtoon->id);
  }


  public function edit($id)
  {
    $webtoon = Webtoon::findOrFail($id);
    return view('works.edit', compact('webtoon'));
  }

}
