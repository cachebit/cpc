<?php

namespace App;

use Image;
use Auth;
use File;

class Cover extends Model
{
  protected $table = 'covers';

  protected $fillable = ['cover', 'cover_m', 'cover_s'];

  public function save_img($img)
  {
    if($this->is_image($img))
    {
      $path_array = $this->move_img($img);

      return $path_array;
    }

    return [];
  }

  protected function is_image($img)
  {
    $extension = $img->getClientOriginalExtension();

    return $extension === 'jpg' || $extension === 'png' ||  $extension === 'jpeg';
  }

  protected function move_img($img)
  {
    $directory = $this->make_dir(Auth::id());

    $extension = $img->getClientOriginalExtension();

    if($extension === 'jepg')
    {
      $extension = 'jpg';
    }

    $img_name = str_random(30);

    $path_array['cover'] = $directory.$img_name.'.'.$extension;
    $path_array['cover_m'] = $directory.$img_name.'_m.'.$extension;
    $path_array['cover_s'] = $directory.$img_name.'_s.'.$extension;

    Image::make($img)->resize(1024, null, function ($constraint) {
      $constraint->aspectRatio();
    })->save($path_array['cover']);

    Image::make($img)->fit(360, 240)->save($path_array['cover_m']);

    Image::make($img)->fit(100)->save($path_array['cover_s']);

    $path_array['cover'] = '/'.$path_array['cover'];
    $path_array['cover_m'] = '/'.$path_array['cover_m'];
    $path_array['cover_s'] = '/'.$path_array['cover_s'];

    return $path_array;
  }

  protected function make_dir($user_id)
  {
    $directory = 'images/'.$user_id.'/stories/covers/';

    if(!File::isDirectory($directory)){
      File::makeDirectory($directory,  $mode = 0755, $recursive = true);
    }

    return $directory;
  }

  public function imageable()
  {
    return $this->morphTo();
  }
}
