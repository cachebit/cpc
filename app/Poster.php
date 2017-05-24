<?php

namespace App;

use App\HasImage;

class Poster extends HasImage
{
  protected $table = 'posters';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
