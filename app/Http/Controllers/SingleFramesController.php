<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SingleFrame;
use File;

class SingleFramesController extends Controller
{

  public function edit($id)
  {
    $genre = SingleFrame::findOrFail($id);
    $user = $genre->user;
    return view('works.genre_edit',compact('genre', 'user'));
  }

  public function update(Request $request)
  {
    $this->validate($request,[
      'id' => 'required',
      'image' => 'required|image|max:5120'
    ]);

    if($request->hasFile('image'))
    {
      $img = $request->file('image');
      $single_frame = SingleFrame::findOrFail($request->id);

      //rename
      $original_file_name = $img->getClientOriginalName();
      $size = $img->getClientSize();
      $user_id = $single_frame->imageable->user_id;
      $extension = $img->guessClientExtension();
      if($extension === 'jpeg')
      {
        $extension = 'jpg';
      }

      $file_name = $user_id.$size.$original_file_name;

      //make path
      $genre = $single_frame->imageable->genre;
      $path_genre = 'g/'.$user_id.'/'.$genre;

      if(!File::exists($path_genre))
      {
        File::makeDirectory($path_genre,  $mode = 777, $recursive = true);
      }

      //save img
      if(!File::exists($path_genre))
      {
        session()->flash('danger', '路径建立失败，请联系管理员');
        return redirect()->route('single_frames.edit', $request->id);
      } else {
        while(File::exists($path_genre.'/'.$file_name))
        {
          $file_name = '1_'.$file_name;
        }
        $img->move($path_genre, $file_name);
        $single_frame->update([
          'path' => '/'.$path_genre.'/'.$file_name,
        ]);
      }

      return redirect()->route('single_frames.show', $request->id);
    }else{
      session()->flash('danger', '上传失败，请重试。');
      return redirect()->route('single_frames.edit', $request->id);
    }

  }

  public function show($id)
  {
    $genre = SingleFrame::findOrFail($id);
    $user = $genre->user;
    return view('works.genre_show',compact('genre', 'user'));
  }

}
