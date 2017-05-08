<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleFrame extends Model
{
  

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
