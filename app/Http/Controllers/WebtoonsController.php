<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Webtoon;
use App\Section;
use Auth;

class WebtoonsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

     public function create_in_section(Section $section)
     {
       return view('create.webtoon_in_section', compact('section'));
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
      $quantity = $this->save_webtoons($request, $section);

      if($quantity){
        $story = $section->get_story();
        if(!$story->type){
          $story->type ='条漫';
          $story->save();
        }

        session()->flash('success', $quantity.'张条漫储存完成！');
        return redirect()->route('sections.show', [$story->id, $section->id]);
      }else{
        session()->flash('warning', '未储存任何条漫，请检查图像格式和大小。');
        return redirect()->back();
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Webtoon $webtoon)
    {
      return view('edit.webtoon', compact('webtoon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webtoon $webtoon)
    {
      $this->validate($request, [
        'image' => 'image',
      ]);

      $img = $request->file('image');

      if($img && $webtoon->is_img($img)){

        $webtoon->update($webtoon->save_img($img, 'webtoons'));

      }

      $story = $webtoon->section->get_story();

      return redirect()->route('sections.show', [$story->id, $webtoon->section->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webtoon $webtoon)
    {
      $story = $webtoon->section->get_story();
      $section = $webtoon->section;
      $webtoon->delete();
      return redirect()->route('sections.show', [$story->id, $section->id]);
    }

    protected function save_webtoons(Request $request, Section $section)
    {
      $imgs = $request->file('image');

      $quantity = 0;

      if(count($imgs)){
        foreach($imgs as $img){

          if($section->is_img($img)){

            $webtoon = new Webtoon();

            $path_array = $webtoon->save_img($img, 'webtoons');

            $webtoon->fill($path_array);

            $section->webtoons()->save($webtoon);

            $quantity++;
          }
        }
      }

      return $quantity;
    }
}
