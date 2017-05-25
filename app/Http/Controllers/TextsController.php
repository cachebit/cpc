<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Text;
use App\Section;
use Auth;

class TextsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', [
          'only' => ['create', 'create_in_section', 'store', 'store_in_section', 'edit', 'update', 'destroy']
      ]);
    }

  public function create()
  {

  }

   public function create_in_section(Section $section)
   {
     $this->authorize('update', $section->get_user());

     return view('create.text_in_section', compact('section'));
   }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  public function store_in_section(Request $request, Section $section)
  {
    $this->validate($request, [
      'body' => 'required|max:10000',
    ]);

    $this->authorize('update', $section->get_user());

    $text = new Text($request->all());

    $section->texts()->save($text);

    $story = $section->get_story();
    if(!$story->type){
      $story->type ='文字剧本';
      $story->save();
    }

    session()->flash('success', '文字剧本储存完成！');
    return redirect()->route('sections.show', [$story->id, $section->id]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Text $text)
  {
    $this->authorize('update', $text->get_user());

    return view('edit.text', compact('text'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Text $text)
  {
    $this->validate($request, [
      'body' => 'required|max:10000',
    ]);

    $this->authorize('update', $text->get_user());

    $text->update($request->all());

    $story = $text->section->get_story();

    return redirect()->route('sections.show', [$story->id, $text->section->id]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Text $text)
  {
    $this->authorize('update', $text->get_user());
    
    $story = $text->section->get_story();
    $section = $text->section;
    $text->delete();
    return redirect()->route('sections.show', [$story->id, $section->id]);
  }
}
