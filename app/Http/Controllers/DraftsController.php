<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Draft;
use App\Story;
use Auth;

class DraftsController extends Controller
{
  public function index()
  {
    $drafts = Draft::paginate(30);
    return view('index.drafts', compact('drafts'));
  }

  //显示某用户的所有海报
  public function user_drafts(\App\User $user)
  {
    $drafts = $user->drafts()->paginate(30);
    return view('index.drafts', compact('drafts'));
  }

  //显示某标签下的所有海报
  public function tag_drafts()
  {
    return 'tag_drafts';
  }

  public function story_drafts(Story $story)
  {
    $drafts = $story->drafts()->paginate(30);
    return view('index.drafts', compact('drafts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $stories = Story::where('user_id', Auth::id())->paginate(30);
    return view('create.draft', compact('stories'));
  }

  public function create_in_story(Story $story)
  {
    return view('create.draft_in_story', compact('story'));
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
      'content' => 'required|max:10000',
      'story_id' => 'required',
    ]);

    $story = Story::findOrFail($request->story_id);

    $draft = new Draft($request->all());

    $draft = $story->drafts()->save($draft);

    session()->flash('success', '随笔储存完成！');
    return redirect()->route('stories.show', $story->id);
  }

  public function store_in_story(Request $request, Story $story)
  {
    $this->validate($request, [
      'title' => 'required|max:100',
      'description' => 'required|max:420',
      'content' => 'required|max:10000',
    ]);

    $draft = new Draft($request->all());

    $draft = $story->drafts()->save($draft);

    session()->flash('success', '随笔储存完成！');
    return redirect()->route('stories.show', $story->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Draft $draft)
  {
    return view('show.draft', compact('draft'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Draft $draft)
  {
    return view('edit.draft', compact('draft'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Draft $draft)
  {
    $this->validate($request, [
      'title' => 'required|max:100',
      'description' => 'required|max:420',
      'content' => 'required|max:10000',
    ]);

    $draft->update($request->all());

    return redirect()->route('drafts.show', $draft->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Draft $draft)
  {
    $id = $draft->story_id;
    $draft->delete();
    session()->flash('success', '成功删除随笔。');
    return redirect()->route('drafts.story_drafts', $id);
  }
}