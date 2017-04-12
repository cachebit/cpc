<?php

namespace App;


class MultipleFrame extends Picture
{
  protected $table = 'multiple_frames';

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function imageable()
  {
      return $this->morphTo();
  }
}
