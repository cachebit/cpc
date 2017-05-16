<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
use File;
use Image;

class Poster extends Model
{

  protected $table = 'posters';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

  public function save_img($img)
  {
    $path_array = $this->move_img($img);

    return $path_array;
  }

  static public function is_image($img)
  {
    if($img === null){
      return false;
    }

    $extension = $img->getClientOriginalExtension();

    return $extension === 'jpg' || $extension === 'png' ||  $extension === 'jpeg';
  }

  //return path_array of path and path_s of Poster
  protected function move_img($img)
  {
    $directory = $this->make_dir(Auth::id());

    $extension = $img->getClientOriginalExtension();

    if($extension === 'jepg')
    {
      $extension = 'jpg';
    }

    $img_name = str_random(30);

    $path_array['path'] = $directory.$img_name.'.'.$extension;

    $path_array['path_s'] = $directory.$img_name.'_s.'.$extension;

    Image::make($img)->resize(1024, null, function ($constraint) {
      $constraint->aspectRatio();
    })->save($path_array['path']);

    Image::make($img)->resize(200, null, function ($constraint) {
      $constraint->aspectRatio();
    })->save($path_array['path_s']);

    $path_array['path'] = '/'.$path_array['path'];
    $path_array['path_s'] = '/'.$path_array['path_s'];

    return $path_array;
  }

  protected function make_dir($user_id)
  {
    $directory = 'images/'.$user_id.'/posters/';

    if(!File::isDirectory($directory)){
      File::makeDirectory($directory,  $mode = 0755, $recursive = true);
    }

    return $directory;
  }

  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
