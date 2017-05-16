<?php

namespace App;

use App\ImageHolder;

class MultipleFrame extends ImageHolder
{


  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
