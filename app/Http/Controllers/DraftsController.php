<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Draft;
use App\Scenario;

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
        'genre' => 'required',
      ]);

      $draft = Draft::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      $function = $draft->genre;

      return $this->$function($draft);
    }
    public function scenarios(Draft $draft)
    {
      $scenario = new Scenario([
        'user_id' => $draft->user_id,
        'content' => 'add contents',
      ]);

      $draft->scenarios()->save($scenario);

      return redirect()->route('scenarios.edit', $scenario->id);
    }


}
