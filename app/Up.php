<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Up extends Model
{
  protected $table = 'ups';

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function imageable()
  {
    return $this->morphTo();
  }
}
