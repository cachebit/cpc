<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Section;
use App\Story;
use App\Volum;
use App\Cover;
use File;
use Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Story $story)
    {
      return view('index.section', compact('story'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Story $story)
    {
      return view('create.section', compact('story'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Story $story, Request $request)
    {
      $this->validate($request,[
        'title' => 'required|max:100',
        'description' => 'required|max:420',
        'volum_title' => 'max:100',
        'volum_description' => 'max:420',
        'volum_cover' => 'image'
      ]);

      $section = new Section($request->all());

      if($request->volum_title){

        $volum = new Volum();

        $img = $request->file('volum_cover');

        $directory = $story->make_covers_dir(Auth::id());

        $path = $story->save_covers($img, $directory);

        $cover = new Cover($path);

        $volum->fill([
          'title' => $request->volum_title,
          'description' => $request->volum_description,
          'volum' => $story->current_volum,
        ]);

        $story->volums()->save($volum)->covers()->save($cover);

        $story->current_volum++;

        $story->save();
      }

      $section->fill(['volum' => $story->current_volum]);

      $story->sections()->save($section);

      return redirect()->route('sections.show', $section->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story, Section $section)
    {
      return view('show.section', compact('section'));
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

      $imgs = $request->file('image');

      foreach($imgs as $img)
      {
        $webtoon = new \App\Webtoon();

        $path_array = $webtoon->save_img($img);

        $webtoon->fill($path_array);

        $section->webtoons()->save($webtoon);
      }

      if($section->story->type === '')
      {
        $section->story->type = '条漫';
        $section->story->save();
      }

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
