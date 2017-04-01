<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function scenarios()
  {
      return $this->morphMany('App\Scenario', 'imageable');
  }
}