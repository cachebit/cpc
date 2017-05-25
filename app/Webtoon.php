<?php

namespace App;

use App\HasImage;

class Webtoon extends HasImage
{
  protected $table = 'webtoons';

  protected $fillable = ['path', 'path_s'];

  //eloquents relations function
  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
