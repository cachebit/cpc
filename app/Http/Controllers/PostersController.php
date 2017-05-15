<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Poster;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('create.poster');
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
        'title' => 'max:100',
        'description' => 'max:420',
        'story_id' => 'required',
      ]);

      $story = \App\Story::findOrFail($request->story_id);

      $quantity = $this->save_posters($request, $story);

      session()->flash('success', $quantity.'张海报储存完成！');
      return redirect()->route('stories.show', $story->id);
    }

    protected function save_posters(Request $request, \App\Story $story)
    {
      $imgs = $request->file('image');

      $quantity = 0;

      foreach($imgs as $img){

        if(Poster::is_image($img)){

          $poster = new Poster($request->all());

          if(!$poster->title){
            $poster->fill(['title' => $story->title.'的海报']);
          }

          if(!$poster->description){
            $poster->fill(['description' => $story->title.'的海报']);
          }

          $path_array = $poster->save_img($img);

          $poster->fill($path_array);

          $story->posters()->save($poster);

          $quantity++;
        }
      }

      return $quantity;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
