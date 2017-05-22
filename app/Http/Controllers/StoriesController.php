<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Story;
use App\Cover;
use Auth;

class StoriesController extends Controller
{
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
      return view('show.story', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
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
      $story->delete();
      session()->flash('success', '成功删除作品！');
      return redirect()->route('stories.index');
    }

    public function add(Story $story)
    {
      return view('add.add', compact('story'));
    }

    public function go_delete(Story $story)
    {
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
