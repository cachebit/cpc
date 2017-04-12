<?php

namespace App;


class Setting extends Type implements Publishable
{
  protected $table = 'settings';

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function single_frames()
  {
      return $this->morphMany('App\SingleFrame', 'imageable');
  }

  public function scenarios()
  {
      return $this->morphMany('App\Scenario', 'imageable');
  }
}
