<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Scenario;
use Auth;

class ScenariosController extends Controller
{
  public function edit($id)
  {
    $genre = Scenario::findOrFail($id);
    $user = $genre->user;
    return view('works.genre_edit',compact('genre', 'user'));
  }

  public function update(Request $request)
  {

    $this->validate($request,[
      'id' => 'required',
      'content' => 'required|min:1'
    ]);

    $scenario = Scenario::findOrFail($request->id);
    $scenario->update([
      'content' => $request->content,
    ]);

    return redirect()->route('scenarios.show', $request->id);
  }

  public function show($id)
  {
    $genre = Scenario::findOrFail($id);
    $user = $genre->user;
    return view('works.genre_show',compact('genre', 'user'));
  }
}
