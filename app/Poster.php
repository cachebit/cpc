<?php

namespace App;

use App\HasImage;

use Auth;
use File;
use Image;

class Poster extends HasImage
{

  protected $table = 'posters';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
