<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sketch;
use App\Story;
use App\Gallery;
use Auth;


class SketchesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', [
        'only' => ['create', 'create_in_story', 'store', 'store_in_story', 'edit', 'update', 'destroy', 'save_sketches']
    ]);
  }

  public function gallery(Sketch $sketch)
  {
    $this->authorize('update', $sketch->get_user());

    if(count($sketch->galleries))
    {
      session()->flash('warning', '已入展，不要重复添加！');
    }else{
      $gallery = new Gallery();
      $gallery->user_id = Auth::id();
      $gallery = $sketch->galleries()->save($gallery);

      session()->flash('success', '入展成功！');
    }

    return redirect()->back();
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $sketches = Sketch::paginate(30);
    return view('index.sketches', compact('sketches'));
  }

  //显示某用户的所有海报
  public function user_sketches(\App\User $user)
  {
    $sketches = $user->sketches()->paginate(30);
    return view('index.sketches', compact('sketches'));
  }

  //显示某标签下的所有海报
  public function tag_sketches()
  {
    return 'tag_sketches';
  }

  public function story_sketches(Story $story)
  {
    $sketches = $story->sketches()->paginate(30);
    return view('index.sketches', compact('sketches'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $stories = Story::where('user_id', Auth::id())->paginate(30);
    return view('create.sketch', compact('stories'));
  }

  public function create_in_story(Story $story)
  {
    $this->authorize('update', $story->get_user());

    return view('create.sketch_in_story', compact('story'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required|max:100',
      'description' => 'required|max:420',
      'story_id' => 'required',
    ]);

    $story = Story::findOrFail($request->story_id);

    $this->authorize('update', $story->get_user());

    $quantity = $this->save_sketches($request, $story);

    if($quantity){
      session()->flash('success', $quantity.'张草图储存完成！');
      return redirect()->route('stories.show', $story->id);
    }else{
      session()->flash('warning', '未储存任何草图，请检查图像格式和大小。');
      return redirect()->back();
    }

  }

  public function store_in_story(Request $request, Story $story)
  {
    $this->validate($request, [
      'title' => 'required|max:100',
      'description' => 'required|max:420',
    ]);

    $this->authorize('update', $story->get_user());

    $quantity = $this->save_sketches($request, $story);

    if($quantity){
      session()->flash('success', $quantity.'张草图储存完成！');
      return redirect()->route('stories.show', $story->id);
    }else{
      session()->flash('warning', '未储存任何草图，请检查图像格式和大小。');
      return redirect()->back();
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Sketch $sketch)
  {
    return view('show.sketch', compact('sketch'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Sketch $sketch)
  {
    $this->authorize('update', $sketch->get_user());

    return view('edit.sketch', compact('sketch'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Sketch $sketch)
  {
    $this->validate($request, [
      'title' => 'required|max:100',
      'description' => 'required|max:420',
      'image' => 'image',
    ]);

    $this->authorize('update', $sketch->get_user());

    $img = $request->file('image');

    $sketch->update($request->all());

    if($img && $sketch->is_img($img)){

      $sketch->update($sketch->save_img($img, 'sketches'));

    }

    return redirect()->route('sketches.show', $sketch->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Sketch $sketch)
  {
    $this->authorize('update', $sketch->get_user());

    $id = $sketch->story_id;
    $sketch->delete();
    session()->flash('success', '成功删除草图。');
    return redirect()->route('sketches.story_sketches', $id);
  }

  protected function save_sketches(Request $request, Story $story)
  {
    $imgs = $request->file('image');

    $quantity = 0;

    if(count($imgs)){
      foreach($imgs as $img){

        if($story->is_img($img)){

          $sketch = new Sketch($request->all());

          $path_array = $sketch->save_img($img, 'sketches');

          $sketch->fill($path_array);

          $story->sketches()->save($sketch);

          $quantity++;
        }
      }
    }

    return $quantity;
  }
}
