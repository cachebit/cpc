<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Section;
use File;
use Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sections = Section::orderBy('created_at', 'desc')->paginate(30);
      return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('sections.create');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
      return view('sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function add(Section $section)
    {
      return view('sections.add', compact('section'));
    }

    public function webtoons(Section $section)
    {
      return view('sections.add_webtoons', compact('section'));
    }

    public function multiple_frames(Section $section)
    {
      return view('sections.add_multiple_frames', compact('section'));
    }

    public function texts(Section $section)
    {
      return view('sections.add_texts', compact('section'));
    }

    public function save_webtoons(Request $request, Section $section)
    {
      $this->validate($request, [
        'image' => 'required',
      ]);

      $imgs = $request->file('image');

      foreach($imgs as $img)
      {
        $webtoon = new \App\Webtoon();

        $webtoon->make($img);

        $section->webtoons()->save($webtoon);
      }

      $story = $section->story;
      $story->type = '条漫';
      $story->save();

      return redirect()->route('sections.show', $section->id);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
      $id = $section->story->id;
      $section->delete();
      session()->flash('success', '成功删除章节！');
      return redirect()->route('stories.show', $id);
    }
}
