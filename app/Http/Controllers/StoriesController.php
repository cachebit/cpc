<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Story;
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
      ]);

      $story = new Story($request->all());

      Auth::user()->stories()->save($story);

      return redirect()->route('stories.show', $story->id);
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
      ]);

      $story->update($request->all());

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