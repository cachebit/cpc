<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Poster;
use App\Story;
use Auth;

class PostersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posters = Poster::paginate(30);
      return view('index.posters', compact('posters'));
    }

    //显示某用户的所有海报
    public function user_posters(\App\User $user)
    {
      $posters = $user->posters()->paginate(30);
      return view('index.posters', compact('posters'));
    }

    //显示某标签下的所有海报
    public function tag_posters()
    {
      return 'tag_stories';
    }

    public function story_posters()
    {
      return 'story_stories';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $stories = Story::where('user_id', Auth::id())->paginate(30);
      return view('create.poster', compact('stories'));
    }

    public function create_in_story(Story $story)
    {
      return view('create.poster_in_story', compact('story'));
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
        'story_id' => 'required',
      ]);

      $story = Story::findOrFail($request->story_id);

      $quantity = $this->save_posters($request, $story);

      if($quantity){
        session()->flash('success', $quantity.'张海报储存完成！');
        return redirect()->route('stories.show', $story->id);
      }else{
        session()->flash('warning', '未储存任何海报，请检查图像格式和大小。');
        return redirect()->back();
      }

    }

    public function store_in_story(Request $request, Story $story)
    {
      $this->validate($request, [
        'title' => 'required|max:100',
        'description' => 'required|max:420',
      ]);

      $quantity = $this->save_posters($request, $story);

      if($quantity){
        session()->flash('success', $quantity.'张海报储存完成！');
        return redirect()->route('stories.show', $story->id);
      }else{
        session()->flash('warning', '未储存任何海报，请检查图像格式和大小。');
        return redirect()->back();
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Poster $poster)
    {
      return view('show.poster', compact('poster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Poster $poster)
    {
      return view('edit.poster', compact('poster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poster $poster)
    {
      $this->validate($request, [
        'title' => 'required|max:100',
        'description' => 'required|max:420',
        'image' => 'image',
      ]);

      $img = $request->file('image');

      $poster->update($request->all());

      if($poster->is_img($img)){

        $poster->update($poster->save_img($img, 'posters'));

      }

      return redirect()->route('posters.show', $poster->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poster $poster)
    {
      $id = $poster->story->id;
      $poster->delete();
      session()->flash('success', '成功删除海报。');
      return redirect()->route('stories.show', $id);
    }

    protected function save_posters(Request $request, Story $story)
    {
      $imgs = $request->file('image');

      $quantity = 0;

      if(count($imgs)){
        foreach($imgs as $img){

          if($story->is_img($img)){

            $poster = new Poster($request->all());

            $path_array = $poster->save_img($img, 'posters');

            $poster->fill($path_array);

            $story->posters()->save($poster);

            $quantity++;
          }
        }
      }

      return $quantity;
    }
}
