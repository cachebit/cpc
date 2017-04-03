<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Sketch;

class SketchesController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'sketches']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
      ]);

      $sketch = Sketch::create([
        'title' => $request->title,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      return redirect()->route('sketches.show',$sketch->id);
    }

    public function show($id)
    {
      $request = Sketch::findOrFail($id);

      return view('works.show',compact('request'));
    }


}
