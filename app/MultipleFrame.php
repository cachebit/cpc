<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleFrame extends Model
{
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function imageable()
  {
      return $this->morphTo();
  }
}
