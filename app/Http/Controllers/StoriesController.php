<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Story;
use Auth;
use File;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stories = Story::orderBy('created_at', 'desc')->paginate(30);
      return view('stories.index', compact('stories'));
    }

    public function stories(\App\User $user)
    {
      $stories = $user->stories;
      return view('stories.stories', compact('stories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('stories.create');
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

      $img = $request->file('image');

      $directory = $this->make_dir(Auth::id());

      $path = $this->save_img($img, $directory);

      $story = new Story($request->all());

      $story->cover = $path;

      Auth::user()->stories()->save($story);

      return redirect()->route('stories.show', $story->id);
    }

    protected function make_dir($user_id)
    {
      $directory = 'images/'.$user_id.'/stories/cover/';

      if(!File::isDirectory($directory)){
        File::makeDirectory($directory,  $mode = 0755, $recursive = true);
      }

      return $directory;
    }

    protected function save_img($img, $directory)
    {
      $extension = $img->getClientOriginalExtension();

      if($extension === 'jepg')
      {
        $extension = 'jpg';
      }

      $img_name = str_random(30).'.'.$extension;

      $img->move($directory, $img_name);

      return '/'.$directory.$img_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
      return view('stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
      return view('stories.edit', compact('story'));
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
        $directory = $this->make_dir(Auth::id());

        $path = $this->save_img($img, $directory);

        $story->cover = $path;
      }

      $story->title = $request->title;

      $story->description = $request->description;

      $story->save();

      return view('stories.show', compact('story'));
    }

    public function add(Story $story)
    {
      return view('stories.add', compact('story'));
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

    public function go_delete(Story $story)
    {
      return view('stories.delete', compact('story'));
    }

    public function add_section(Story $story)
    {
      return view('stories.add_section', compact('story'));
    }

    public function save_section(Story $story, Request $request)
    {
      $this->validate($request,[
        'title' => 'required|max:100',
        'description' => 'required|max:420',
      ]);

      $section = new \App\Section($request->all());

      $story->sections()->save($section);

      return redirect()->route('sections.show', $section->id);
    }
}
