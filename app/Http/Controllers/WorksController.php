<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Webtoon;
use App\SingleFrame;
use App\MultipleFrame;
use App\Scenario;
use App\Publishable;

class WorksController extends Controller
{

    public function start()
    {
        return view('works.start');
    }

    public function distribute(Request $request)
    {
      $this->validate($request, [
        'type' => 'required',
      ]);

      return redirect()->route($request->type.'.create');
    }

    public function webtoons(Publishable $work)
    {
      $webtoon = new Webtoon([
        'user_id' => $work->user_id,
        'path' => 'image path',
      ]);

      $work->webtoons()->save($webtoon);

      return redirect()->route('webtoons.edit', $webtoon->id);
    }

    public function single_frames(Publishable $work)
    {
      $single_frame = new SingleFrame([
        'user_id' => $work->user_id,
        'path' => 'image path',
      ]);

      $work->single_frames()->save($single_frame);

      return redirect()->route('single_frames.edit', $single_frame->id);
    }

    public function multiple_frames(Publishable $work)
    {
      $multiple_frame = new MultipleFrame([
        'user_id' => $work->user_id,
        'path' => 'image path',
      ]);

      $work->multiple_frames()->save($multiple_frame);

      return redirect()->route('multiple_frames.edit', $multiple_frame->id);
    }

    public function scenarios(Publishable $work)
    {
      $scenario = new Scenario([
        'user_id' => $work->user_id,
        'content' => 'add contents',
      ]);

      $work->scenarios()->save($scenario);

      return redirect()->route('scenarios.edit', $scenario->id);
    }

}
