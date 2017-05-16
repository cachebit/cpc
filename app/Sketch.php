<?php

namespace App;

use App\ImageHolder;

class Sketch extends ImageHolder
{


  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
