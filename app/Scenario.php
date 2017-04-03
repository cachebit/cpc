<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
  protected $table = 'scenarios';

  protected $fillable = [
    'user_id',
    'content',
    'imageable_id',
    'imageable_type',
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
