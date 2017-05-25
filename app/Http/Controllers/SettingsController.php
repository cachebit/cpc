<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting;
use App\Story;
use Auth;

class SettingsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', [
        'only' => ['create', 'create_in_story', 'store', 'store_in_story', 'edit', 'update', 'destroy', 'save_settings']
    ]);
  }

  public function index()
  {
    $settings = Setting::paginate(30);
    return view('index.settings', compact('settings'));
  }

  //显示某用户的所有海报
  public function user_settings(\App\User $user)
  {
    $settings = $user->settings()->paginate(30);
    return view('index.settings', compact('settings'));
  }

  //显示某标签下的所有海报
  public function tag_settings()
  {
    return 'tag_settings';
  }

  public function story_settings(Story $story)
  {
    $settings = $story->settings()->paginate(30);
    return view('index.settings', compact('settings'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $stories = Story::where('user_id', Auth::id())->paginate(30);
    return view('create.setting', compact('stories'));
  }

  public function create_in_story(Story $story)
  {
    $this->authorize('update', $story->get_user());

    return view('create.setting_in_story', compact('story'));
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

    $quantity = $this->save_settings($request, $story);

    if($quantity){
      session()->flash('success', $quantity.'张设定储存完成！');
      return redirect()->route('stories.show', $story->id);
    }else{
      session()->flash('warning', '未储存任何设定，请检查图像格式和大小。');
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

    $quantity = $this->save_settings($request, $story);

    if($quantity){
      session()->flash('success', $quantity.'张设定储存完成！');
      return redirect()->route('stories.show', $story->id);
    }else{
      session()->flash('warning', '未储存任何设定，请检查图像格式和大小。');
      return redirect()->back();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Setting $setting)
  {
    return view('show.setting', compact('setting'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Setting $setting)
  {
    $this->authorize('update', $setting->get_user());

    return view('edit.setting', compact('setting'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Setting $setting)
  {
    $this->validate($request, [
      'title' => 'required|max:100',
      'description' => 'required|max:420',
      'image' => 'image',
    ]);

    $this->authorize('update', $setting->get_user());

    $img = $request->file('image');

    $setting->update($request->all());

    if($img && $setting->is_img($img)){

      $setting->update($setting->save_img($img, 'settings'));

    }

    return redirect()->route('settings.show', $setting->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Setting $setting)
  {
    $this->authorize('update', $setting->get_user());

    $id = $setting->story_id;
    $setting->delete();
    session()->flash('success', '成功删除设定。');
    return redirect()->route('settings.story_settings', $id);
  }

  protected function save_settings(Request $request, Story $story)
  {
    $imgs = $request->file('image');

    $quantity = 0;

    if(count($imgs)){
      foreach($imgs as $img){

        if($story->is_img($img)){

          $setting = new Setting($request->all());

          $path_array = $setting->save_img($img, 'settings');

          $setting->fill($path_array);

          $story->settings()->save($setting);

          $quantity++;
        }
      }
    }

    return $quantity;
  }
}
