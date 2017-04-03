<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Dradt;

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

      $draft = Draft::create([
        'title' => $request->title,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      return redirect()->route('drafts.show',$draft->id);
    }

    public function show($id)
    {
      $request = Draft::findOrFail($id);

      return view('works.show',compact('request'));
    }

}
