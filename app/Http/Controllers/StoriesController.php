<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Story;
use App\Cover;
use App\Up;
use Auth;

class StoriesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', [
          'only' => ['create', 'store', 'edit', 'update', 'destroy', 'add', 'go_delete', 'save_story']
      ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stories = Story::orderBy('created_at', 'desc')->paginate(24);

      return view('index.stories', compact('stories'));
    }

    //显示某用户的所有故事/专辑
    public function user_stories(\App\User $user)
    {
      $stories = $user->stories()->orderBy('created_at', 'desc')->paginate(30);
      return view('index.stories', compact('stories'));
    }

    //显示某标签下的所有故事/专辑
    public function tag_stories()
    {
      return 'tag_stories';
    }

    public function up(Story $story)
    {
      $this->authorize('up', $story->get_user());

      $story->up = $story->up+1;
      $story->save();

      $up = new Up();
      $up->user_id = Auth::id();
      $story->ups()->save($up);

      session()->flash('success', '成功点赞！');
      return redirect()->back();
    }

    public function down(Story $story)
    {
      $this->authorize('up', $story->get_user());

      $story->up = $story->up == 0?0:$story->up-1;
      $story->save();

      $story->ups()->where('user_id', Auth::id())->delete();

      session()->flash('warning', '取消点赞');
      return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('create.story');
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
        'image' => 'required|image',
      ]);

      $story = $this->save_story($request);

      return redirect()->route('stories.add', $story->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
      if(count($story->volums) && count($story->sections)){
        return redirect()->route('stories.sections_to_volums', $story->id);
      }else{
        return view('show.story', compact('story'));
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
      $this->authorize('update', $story->get_user());

      return view('edit.story', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
      $this->validate($request,[
        'title' => 'required|max:100',
        'description' => 'required|max:420',
        'image' => 'image',
      ]);

      $this->authorize('update', $story->get_user());

      $img = $request->file('image');

      if($img)
      {
        $directory = $story->make_covers_dir(Auth::id());
        $path = $story->update_covers($img, $directory);
        $story->covers()->first()->update($path);
      }

      $story->title = $request->title;
      $story->description = $request->description;
      $story->save();

      return redirect()->route('stories.show', $story->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
      $this->authorize('update', $story->get_user());

      $story->delete();
      session()->flash('success', '成功删除作品！');
      return redirect()->route('stories.index');
    }

    public function add(Story $story)
    {
      $this->authorize('update', $story->get_user());

      return view('stories.add', compact('story'));
    }

    public function go_delete(Story $story)
    {
      $this->authorize('update', $story->get_user());

      return view('stories.delete', compact('story'));
    }

    public function save_story(Request $request)
    {
      $story = new Story($request->all());

      $path = $story->save_covers($request->file('image'), $story->make_covers_dir(Auth::id()));

      $cover = new Cover($path);

      Auth::user()->stories()->save($story);

      $story->covers()->save($cover);

      return $story;
    }
}
