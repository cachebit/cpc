<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
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
