<?php

namespace App;


class Webtoon extends Picture
{
  protected $table = 'webtoons';

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function imageable()
  {
      return $this->morphTo();
  }
}
