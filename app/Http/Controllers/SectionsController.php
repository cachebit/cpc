<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Section;
use App\Story;
use App\Volum;
use App\Cover;
use App\Sectionable;
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
      if(count($story->volums))
      {
        return view('index.sections_in_volum', compact('story'));
      }else{
        return view('index.sections', compact('story'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Story $story)
    {
      if(count($story->volums))
      {
        return view('create.section_in_volum', compact('story'));
      }else{
        return view('create.section', compact('story'));
      }
    }

    public function store_in_volum(Request $request)
    {
      $this->validate($request, [
        'volum_id' => 'required',
        'title' => 'required|max:100',
        'description' => 'required|max:420',
        'image' => 'required|image',
      ]);

      $volum = Volum::findOrFail($request->volum_id);
      $section = $this->save_section($request, $volum);

      return redirect()->route('sections.show', [$volum->story->id, $section->id]);
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
        'image' => 'required|image',
      ]);

      $section = $this->save_section($request, $story);

      return redirect()->route('sections.show', [$story->id, $section->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story, Section $section)
    {
      return view('show.section', compact('story', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story, Section $section)
    {
      return view('edit.section', compact('story', 'section'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story, Section $section)
    {
      $this->validate($request,[
        'title' => 'required|max:100',
        'description' => 'required|max:420',
        'image' => 'image',
      ]);

      $img = $request->file('image');

      if($img)
      {
        $directory = $section->make_covers_dir(Auth::id());
        $path = $section->update_covers($img, $directory);
        $section->covers()->first()->update($path);
      }

      $section->title = $request->title;
      $section->description = $request->description;
      $section->save();

      return redirect()->route('sections.show', [$story->id, $section->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story, Section $section)
    {
      $id = $section->imageable->id;
      $section->delete();
      session()->flash('success', '成功删除章节！');
      if(count($story->volums))
      {
        return redirect()->route('volums.show', $id);
      }else{
        return redirect()->route('stories.show', $id);
      }
    }

    public function add_content(Section $section)
    {
      $story = $section->get_story();
      
      return view('sections.add_content', compact('story', 'section'));
    }

    public function save_section(Request $request, Sectionable $sectionable)
    {
      $section = new Section($request->all());

      $path = $section->save_covers($request->file('image'), $sectionable->make_covers_dir(Auth::id()));

      $cover = new Cover($path);

      $section = $sectionable->sections()->save($section);

      $section->covers()->save($cover);

      return $section;
    }
}
