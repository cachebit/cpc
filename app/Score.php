<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
  protected $table = 'scores';

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function gallery()
  {
    return $this->belongsTo('App\Gallery');
  }
}
