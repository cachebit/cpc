<?php

namespace App;


class Poster extends Type implements Publishable
{
  protected $table = 'posters';

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function single_frames()
  {
      return $this->morphMany('App\SingleFrame', 'imageable');
  }
}
