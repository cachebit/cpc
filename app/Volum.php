<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volum extends Model
{


  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
