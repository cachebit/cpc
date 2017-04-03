<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

use App\Opuscule;
use App\Webtoon;
use App\SingleFrame;
use App\MultipleFrame;
use App\Scenario;

class OpusculesController extends Controller
{

    public function create()
    {
      return view('works.create', ['type' => 'opuscules']);
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'genre' => 'required',
      ]);

      $opuscule = Opuscule::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'user_id'=> Auth::user()->id,
        'score' => '0',
        'scored' => false,
      ]);

      $function = $opuscule->genre;

      return $this->$function($opuscule);
    }

    public function webtoons(Opuscule $opuscule)
    {
      $webtoon = new Webtoon([
        'user_id' => $opuscule->user_id,
        'path' => 'image path',
      ]);

      $opuscule->webtoons()->save($webtoon);

      return redirect()->route('webtoons.edit', $webtoon->id);
    }

    public function single_frames(Opuscule $opuscule)
    {
      $single_frame = new SingleFrame([
        'user_id' => $opuscule->user_id,
        'path' => 'image path',
      ]);

      $opuscule->single_frames()->save($single_frame);

      return redirect()->route('single_frames.edit', $single_frame->id);
    }

    public function multiple_frames(Opuscule $opuscule)
    {
      $multiple_frame = new MultipleFrame([
        'user_id' => $opuscule->user_id,
        'path' => 'image path',
      ]);

      $opuscule->multiple_frames()->save($multiple_frame);

      return redirect()->route('multiple_frames.edit', $multiple_frame->id);
    }

    public function scenarios(Opuscule $opuscule)
    {
      $scenario = new Scenario([
        'user_id' => $opuscule->user_id,
        'content' => 'add contents',
      ]);

      $opuscule->scenarios()->save($scenario);

      return redirect()->route('scenarios.edit', $scenario->id);
    }

}
