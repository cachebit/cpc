<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sketch extends Model
{
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function single_frames()
  {
      return $this->morphMany('App\SingleFrame', 'imageable');
  }
}
