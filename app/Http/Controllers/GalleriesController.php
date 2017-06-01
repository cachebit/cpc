<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gallery;
use App\Score;
use Auth;
use Queue;
use App\Jobs\SaveScore;

class GalleriesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', [
        'only' => ['score', 'save_score', 'next_gallery']
    ]);
  }

  public function index()
  {
    $galleries = Gallery::where('scorable', true)->paginate(24);

    return view('index.galleries', compact('galleries'));
  }

  public function top()
  {
    $galleries = Gallery::where('scorable', false)->get();

    return view('show.top_galleries', compact('galleries'));
  }

  public function show(Gallery $gallery)
  {
    return view('show.gallery', compact('gallery'));
  }

  public function score(Request $request, Gallery $gallery)
  {
    $this->validate($request,[
      'score' => 'required|integer|min:1|max:15',
    ]);
    
    $this->authorize('score', $gallery->get_user());

    $id = $this->save_score($gallery, 10*$request->score);

    $id = $this->next_gallery($id);

    if($id === null){
      session()->flash('warning', '勤劳的您把全部的图都评完了，休息一下吧！');
      return redirect()->route('galleries.index');
    }else{
      return redirect()->route('galleries.show', $id);
    }
  }

  public function statistics()
  {
    $galleries = Gallery::where('scorable', false)->get();
    return view('index.statistics', compact('galleries'));
  }

  protected function save_score(Gallery $gallery, $grade)
  {
    if($gallery->scorable){
      $user = Auth::user();
      if($gallery->user_scorable($user))
      {
        Queue::push(new SaveScore($user, $gallery, $grade));
      }
    }

    return ($gallery->id+1);
  }

  protected function next_gallery($id)
  {
    $galleries = Gallery::where('scorable', true)->get();

    $scorable = $galleries->filter(function ($item) {
      return $item->user_scorable(Auth::user());
    });

    return $scorable->first();
  }

  //temprary
  public function set_scorable()
  {
    $galleries = Gallery::all();
    $galleries = $galleries->each(function ($gallery, $key) {
      if(!$gallery->scorable)
      {
        $gallery->unscored();
      }
    });

    session()->flash('success', '重新注册一个用户，可以重新评分打榜。');
    return redirect()->route('galleries.index');
  }
}
