<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Up;
use App\User;

class UpsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', [
        'only' => ['user_recent_uped', 'destroy']
    ]);
  }

  public function user_recent_uped(User $user)
  {
    $ups = Up::where('user_id', $user->id)->get();
    return view('index.ups', compact('ups'));
  }

  public function destroy(Up $up)
  {
    $this->authorize('update', Auth::user());

    $up->delete();
    return redirect()->route('scores.user_recent_uped', Auth::id());
  }
}
