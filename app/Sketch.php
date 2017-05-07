<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sketch extends Model
{


  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
