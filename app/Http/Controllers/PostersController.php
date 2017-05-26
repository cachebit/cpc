<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Poster;
use App\Story;
use App\Gallery;
use Auth;

class PostersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', [
          'only' => ['gallery', 'create', 'create_in_story', 'store', 'store_in_story', 'edit', 'update', 'destroy', 'save_posters']
      ]);
    }

    public function gallery(Poster $poster)
    {
      $this->authorize('update', $poster->get_user());

      if(count($poster->galleries))
      {
        session()->flash('warning', '已入展，不要重复添加！');
      }else{
        $gallery = new Gallery();
        $gallery->user_id = Auth::id();
        $gallery = $poster->galleries()->save($gallery);

        session()->flash('success', '入展成功！');
      }

      return redirect()->back();
    }

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

    public function story_posters(Story $story)
    {
      $posters = $story->posters()->paginate(30);
      return view('index.posters', compact('posters'));
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
      $this->authorize('update', $story->get_user());

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

      $this->authorize('update', $story->get_user());

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

      $this->authorize('update', $story->get_user());

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
      $this->authorize('update', $poster->get_user());

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

      $this->authorize('update', $poster->get_user());

      $img = $request->file('image');

      $poster->update($request->all());

      if($img && $poster->is_img($img)){

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
      $this->authorize('update', $poster->get_user());

      $id = $poster->story->id;
      $poster->delete();
      session()->flash('success', '成功删除海报。');
      return redirect()->route('posters.story_posters', $id);
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
