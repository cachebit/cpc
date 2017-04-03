<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Novel;
use App\Webtoon;
use App\SingleFrame;
use App\MultipleFrame;
use App\Scenario;

class NovelsController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'novels']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'volum' => 'required',
        'section' => 'required',
        'genre' => 'required',
      ]);

      $novel = Novel::create([
        'title' => $request->title,
        'volum'=> $request->volum,
        'section' => $request->section,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      $function = $novel->genre;

      return $this->$function($novel);
    }

    public function webtoons(Novel $novel)
    {
      $webtoon = new Webtoon([
        'user_id' => $novel->user_id,
        'path' => 'image path',
      ]);

      $novel->webtoons()->save($webtoon);

      return redirect()->route('webtoons.edit', $webtoon->id);
    }

    public function single_frames(Novel $novel)
    {
      $single_frame = new SingleFrame([
        'user_id' => $novel->user_id,
        'path' => 'image path',
      ]);

      $novel->single_frames()->save($single_frame);

      return redirect()->route('single_frames.edit', $single_frame->id);
    }

    public function multiple_frames(Novel $novel)
    {
      $multiple_frame = new MultipleFrame([
        'user_id' => $novel->user_id,
        'path' => 'image path',
      ]);

      $novel->multiple_frames()->save($multiple_frame);

      return redirect()->route('multiple_frames.edit', $multiple_frame->id);
    }

    public function scenarios(Novel $novel)
    {
      $scenario = new Scenario([
        'user_id' => $novel->user_id,
        'content' => 'add contents',
      ]);

      $novel->scenarios()->save($scenario);

      return redirect()->route('scenarios.edit', $scenario->id);
    }

}
