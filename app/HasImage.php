<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
use Image;

class HasImage extends Model
{
  
  public function is_img(UploadedFile $img)
  {
    $e = $img->getClientOriginalExtension();
    return $e === 'jpg' || $e === 'jpeg' || $e === 'png';
  }

  public function make_covers_dir($user_id)
  {
    $directory = 'img/covers/'.$user_id.'/';

    if(!File::isDirectory($directory)){
      File::makeDirectory($directory,  $mode = 0755, $recursive = true);
    }

    return $directory;
  }

  public function save_covers(UploadedFile $img, $directory)
  {
    if($img->isValid() && $this->is_img($img))
    {
      $extension = '.'.$img->getClientOriginalExtension();
      $img_name = str_random(30);

      $path = [];
      $path['cover'] = $directory.$img_name.$extension;
      $path['cover_m'] = $directory.$img_name.'_m'.$extension;
      $path['cover_s'] = $directory.$img_name.'_s'.$extension;

      Image::make($img)->fit(1080, 720)->save($path['cover']);
      Image::make($img)->fit(360, 240)->save($path['cover_m']);
      Image::make($img)->fit(180, 120)->save($path['cover_s']);

      $path['cover'] = '/'.$path['cover'];
      $path['cover_m'] = '/'.$path['cover_m'];
      $path['cover_s'] = '/'.$path['cover_s'];

    }else{

      $path['cover'] = '/img/site/cover.png';
      $path['cover_m'] = '/img/site/cover_m.png';
      $path['cover_s'] = '/img/site/cover_s.png';

    }

    return $path;
  }

  public function update_covers(UploadedFile $img, $directory)
  {
    if($img->isValid() && $this->is_img($img))
    {
      $extension = '.'.$img->getClientOriginalExtension();
      $img_name = str_random(30);

      $path = [];
      $path['cover'] = $directory.$img_name;
      $path['cover_m'] = $directory.$img_name.'_m'.$extension;
      $path['cover_s'] = $directory.$img_name.'_s'.$extension;

      Image::make($img)->fit(1024, 768)->save($path['cover']);
      Image::make($img)->fit(360, 240)->save($path['cover_m']);
      Image::make($img)->fit(180, 120)->save($path['cover_s']);

      $path['cover'] = '/'.$path['cover'];
      $path['cover_m'] = '/'.$path['cover_m'];
      $path['cover_s'] = '/'.$path['cover_s'];

    }else{

      $path['cover'] = '/img/site/cover.png';
      $path['cover_m'] = '/img/site/cover_m.png';
      $path['cover_s'] = '/img/site/cover_s.png';

    }

    return $path;
  }
}
