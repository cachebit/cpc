<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Story;
use Auth;
use File;
use App\Cover;

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

      $story = new Story($request->all());

      Auth::user()->stories()->save($story);

      $img = $request->file('image');

      $cover = $this->save_cover($img);

      $story->covers()->save($cover);

      return redirect()->route('stories.show', $story->id);
    }

    public function save_cover($img)
    {
      $cover = new Cover();

      $path_array = $cover->save_img($img);

      $cover->fill($path_array);

      return $cover;
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

      $this->update_cover($img, $story);

      $story->title = $request->title;
      $story->description = $request->description;
      $story->save();

      return redirect()->route('stories.show', $story->id);
    }

    public function update_cover($img, Story $story)
    {
      if($img)
      {
        $cover = $story->covers()->first();
        $path_array = $cover->save_img($img);

        $cover->cover = $path_array['cover'];
        $cover->cover_m = $path_array['cover_m'];
        $cover->cover_s = $path_array['cover_s'];

        $cover->save();

        return true;
      }

      return false;
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
