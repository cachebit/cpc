<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use File;
use Auth;
use Image;

class Webtoon extends Model
{
  protected $table = 'webtoons';

  protected $fillable = ['path'];

  public function make($img)
  {
    if($this->is_image($img))
    {
      $image = Image::make($img);
      $image->save('images/1/webtoons/3.jpg');
      $image->save('images/1/webtoons/4.jpg');
      dd('true');


      $path_array = $this->save_img($img);

      $webtoon = new \App\Webtoon($path_array);

      $section->webtoons()->save($webtoon);

      return $webtoon;
    }

    return null;
  }

  protected function is_image($img)
  {
    return $img->getClientOriginalExtension() === 'jpg' || $img->getClientOriginalExtension() === 'png' ||  $img->getClientOriginalExtension() === 'jpeg';
  }

  protected function make_dir($user_id)
  {
    $directory = 'images/'.$user_id.'/webtoons/';

    if(!File::isDirectory($directory)){
      File::makeDirectory($directory,  $mode = 0755, $recursive = true);
    }

    return $directory;
  }

  protected function save_img($img, $directory)
  {
    $directory = $this->make_dir(Auth::id());

    $extension = $img->getClientOriginalExtension();

    if($extension === 'jepg')
    {
      $extension = 'jpg';
    }

    $img_name = str_random(30);

    $path_array['path'] = $img_name.'.'.$extension;

    $path_array['path_s'] = $img_name.'_s.'.$extension;

    $img->move($directory, $path_array['path']);

    Image::make($path_array['path'])->fit(80)->save($path_array['path_s']);

    dd($path_array);

    return '/'.$directory.$img_name;
  }

  //eloquents relations function
  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
