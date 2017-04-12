<?php

namespace App;


class Sketch extends Type implements Publishable
{
  protected $table = 'sketches';

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function single_frames()
  {
      return $this->morphMany('App\SingleFrame', 'imageable');
  }
}
