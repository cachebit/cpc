<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Setting;

class SettingsController extends WorksController
{
  public function create()
  {
    return view('works.create',['type' => 'settings']);
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

    $function = $setting->genre;

    return parent::$function($setting);
  }

}
