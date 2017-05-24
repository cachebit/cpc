<?php

namespace App;

use App\HasImage;

class Setting extends HasImage
{
  protected $table = 'settings';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
