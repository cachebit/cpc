<?php

namespace App;


class Webtoon extends Picture
{
  protected $table = 'webtoons';

  protected $fillable = [
    'path',
  ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function imageable()
  {
      return $this->morphTo();
  }
}
