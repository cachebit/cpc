<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
  

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
