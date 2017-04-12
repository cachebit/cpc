<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Webtoon;
use File;

class WebtoonsController extends Controller
{
  public function edit($id)
  {
    $genre = Webtoon::findOrFail($id);

    return view('works.genre_edit',compact('genre'));
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
      $webtoon = Webtoon::findOrFail($request->id);

      //rename
      $original_file_name = $img->getClientOriginalName();
      $size = $img->getClientSize();
      $user_id = $webtoon->imageable->user_id;
      $extension = $img->guessClientExtension();

      if($extension === 'jpeg')
      {
        $extension = 'jpg';
      }

      $file_name = $user_id.$size.$original_file_name;

      //make path
      $genre = $webtoon->imageable->genre;
      $path_genre = 'g/'.$user_id.'/'.$genre;

      if(!File::exists($path_genre))
      {
        File::makeDirectory($path_genre,  $mode = 777, $recursive = true);
      }

      //save img
      if(!File::exists($path_genre))
      {
        session()->flash('danger', '路径建立失败，请联系管理员');
        return redirect()->route('webtoons.edit', $request->id);
      } else {
        while(File::exists($path_genre.'/'.$file_name))
        {
          $file_name = '1_'.$file_name;
        }
        $img->move($path_genre, $file_name);
        $webtoon->update([
          'path' => '/'.$path_genre.'/'.$file_name,
        ]);
      }

      return redirect()->route('webtoons.show', $request->id);
    }else{
      session()->flash('danger', '上传失败，请重试。');
      return redirect()->route('webtoons.edit', $request->id);
    }

  }

  public function show($id)
  {
    $genre = Webtoon::findOrFail($id);
    return view('works.genre_show',compact('genre'));
  }
}
