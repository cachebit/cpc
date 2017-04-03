<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Setting;

class SettingsController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'settings']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'genre' => 'required'
      ]);

      $setting = Setting::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      return redirect()->route('settings.show',$setting->id);
    }

    public function show($id)
    {
      $request = Setting::findOrFail($id);

      return view('works.show',compact('request'));
    }



}
