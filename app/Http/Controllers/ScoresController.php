<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Score;
use App\User;
use Auth;

class ScoresController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', [
        'only' => ['user_recent_scored', 'destroy']
    ]);
  }

  public function user_recent_scored(User $user)
  {
    $scores = Score::where('user_id', $user->id)->get();
    return view('index.scores', compact('scores'));
  }

  public function destroy(Score $score)
  {
    $this->authorize('update', Auth::user());
    
    $score->delete();
    return redirect()->route('scores.user_scored', Auth::id());
  }
}
