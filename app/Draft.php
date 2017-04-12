<?php

namespace App;


class Draft extends Type implements Publishable
{
  protected $table = 'drafts';

  public function user()
  {
      return $this->belongsTo('App\User');
  }
  
  public function scenarios()
  {
      return $this->morphMany('App\Scenario', 'imageable');
  }
}
