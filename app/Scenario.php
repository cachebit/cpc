<?php

namespace App;


class Scenario extends Genre
{
  protected $table = 'scenarios';

  protected $fillable = [
    'content',
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
