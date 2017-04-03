<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Novella;
use App\Webtoon;
use App\SingleFrame;
use App\MultipleFrame;
use App\Scenario;

class NovellasController extends Controller
{

    public function create()
    {
        return view('works.create', ['type' => 'novellas']);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'section' => 'required',
        'genre' => 'required',
      ]);

      $novella = Novella::create([
        'title' => $request->title,
        'section' => $request->section,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      $function = $novella->genre;

      return $this->$function($novella);
    }

    public function webtoons(Novella $novella)
    {
      $webtoon = new Webtoon([
        'user_id' => $novella->user_id,
        'path' => 'image path',
      ]);

      $novella->webtoons()->save($webtoon);

      return redirect()->route('webtoons.edit', $webtoon->id);
    }

    public function single_frames(Novella $novella)
    {
      $single_frame = new SingleFrame([
        'user_id' => $novella->user_id,
        'path' => 'image path',
      ]);

      $novella->single_frames()->save($single_frame);

      return redirect()->route('single_frames.edit', $single_frame->id);
    }

    public function multiple_frames(Novella $novella)
    {
      $multiple_frame = new MultipleFrame([
        'user_id' => $novella->user_id,
        'path' => 'image path',
      ]);

      $novella->multiple_frames()->save($multiple_frame);

      return redirect()->route('multiple_frames.edit', $multiple_frame->id);
    }

    public function scenarios(Novella $novella)
    {
      $scenario = new Scenario([
        'user_id' => $novella->user_id,
        'content' => 'add contents',
      ]);

      $novella->scenarios()->save($scenario);

      return redirect()->route('scenarios.edit', $scenario->id);
    }


}
