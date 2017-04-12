<?php

namespace App;


class SingleFrame extends Picture
{
  protected $table = 'single_frames';

  protected $fillable = [
    'path',
    'score',
    'scored',
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
