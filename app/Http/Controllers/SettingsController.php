<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Setting;
use App\SingleFrame;
use App\Scenario;

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

      $function = $setting->genre;

      return $this->$function($setting);
    }

    public function single_frames(Setting $setting)
    {
      $single_frame = new SingleFrame([
        'user_id' => $setting->user_id,
        'path' => 'image path',
      ]);

      $setting->single_frames()->save($single_frame);

      return redirect()->route('single_frames.edit', $single_frame->id);
    }

    public function scenarios(Setting $setting)
    {
      $scenario = new Scenario([
        'user_id' => $setting->user_id,
        'content' => 'add contents',
      ]);

      $setting->scenarios()->save($scenario);

      return redirect()->route('scenarios.edit', $scenario->id);
    }

}
