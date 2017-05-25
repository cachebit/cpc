<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MultipleFrame;
use App\Section;
use Auth;

class MultipleFramesController extends Controller
{
  public function create()
  {

  }

   public function create_in_section(Section $section)
   {
     return view('create.multiple_frame_in_section', compact('section'));
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
    $quantity = $this->save_multiple_frames($request, $section);

    if($quantity){
      $story = $section->get_story();
      if(!$story->type){
        $story->type ='多格漫画';
        $story->save();
      }

      session()->flash('success', $quantity.'张多格漫画储存完成！');
      return redirect()->route('sections.show', [$story->id, $section->id]);
    }else{
      session()->flash('warning', '未储存任何多格漫画，请检查图像格式和大小。');
      return redirect()->back();
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(MultipleFrame $multiple_frame)
  {
    return view('edit.multiple_frame', compact('multiple_frame'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, MultipleFrame $multiple_frame)
  {
    $this->validate($request, [
      'image' => 'image',
    ]);

    $img = $request->file('image');

    if($img && $multiple_frame->is_img($img)){

      $multiple_frame->update($multiple_frame->save_img($img, 'multiple_frames'));

    }

    $story = $multiple_frame->section->get_story();

    return redirect()->route('sections.show', [$story->id, $multiple_frame->section->id]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(MultipleFrame $multiple_frame)
  {
    $story = $multiple_frame->section->get_story();
    $section = $multiple_frame->section;
    $multiple_frame->delete();
    return redirect()->route('sections.show', [$story->id, $section->id]);
  }

  protected function save_multiple_frames(Request $request, Section $section)
  {
    $imgs = $request->file('image');

    $quantity = 0;

    if(count($imgs)){
      foreach($imgs as $img){

        if($section->is_img($img)){

          $multiple_frame = new MultipleFrame();

          $path_array = $multiple_frame->save_img($img, 'multiple_frames');

          $multiple_frame->fill($path_array);

          $section->multiple_frames()->save($multiple_frame);

          $quantity++;
        }
      }
    }

    return $quantity;
  }
}
