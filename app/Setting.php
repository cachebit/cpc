<?php

namespace App;

use App\ImageHolder;

class Setting extends ImageHolder
{


  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
