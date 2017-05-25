<?php

namespace App;

use App\HasImage;

class MultipleFrame extends HasImage
{
  protected $table = 'multiple_frames';

  protected $fillable = ['path', 'path_s'];

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
