<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Volum;
use App\Story;
use App\Cover;

use Auth;

class VolumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Story $story)
    {
      return view('index.volums', compact('story'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Story $story)
    {
      return view('create.volum', compact('story'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Story $story)
    {
      $this->validate($request, [
        'title' => 'required|max:100',
        'description' => 'required|max:420',
        'image' => 'required|image',
      ]);

      $volum = $this->save_volum($request, $story);

      return redirect()->route('volums.show', [$story->id, $volum->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story, Volum $volum)
    {
      return view('show.volum', compact('story', 'volum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Volum $volum)
    {
      return view('edit.volum', compact('volum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volum $volum)
    {
      $this->validate($request, [
        'title' => 'required|max:100',
        'description' => 'required|max:420',
        'image' => 'image',
      ]);

      $img = $request->file('image');

      if($img)
      {
        $directory = $volum->make_covers_dir(Auth::id());
        $path = $volum->update_covers($img, $directory);
        $volum->covers()->first()->update($path);
      }

      $volum->title = $request->title;
      $volum->description = $request->description;
      $volum->save();

      return redirect()->route('volums.show', [$volum->story->id, $volum->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volum $volum)
    {
      $count_volums = count($volum->story->volums);
      $story_id = $volum->story->id;

      if(count($volum->sections)){
        session()->flash('warning', '卷/篇内有章节故事，不能删除。');
        return redirect()->route('volums.index', $story_id);
      }

      $volum->delete();
      $count_volums--;

      if($count_volums){
        return redirect()->route('volums.index', $story_id);
      }else{
        return redirect()->route('stories.show', $story_id);
      }
    }

    public function save_volum(Request $request, Story $story)
    {
      $volum = new Volum($request->all());

      $path = $volum->save_covers($request->file('image'), $volum->make_covers_dir(Auth::id()));

      $cover = new Cover($path);

      $volum = $story->volums()->save($volum);

      $volum->covers()->save($cover);

      return $volum;
    }
}
