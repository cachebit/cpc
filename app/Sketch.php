<?php

namespace App;

use App\HasImage;

class Sketch extends HasImage
{
  protected $table = 'sketches';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
