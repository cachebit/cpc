<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleFrame extends Model
{
  protected $table = 'single_frames';

  protected $fillable = [
    'user_id',
    'path',
    'imageable_id',
    'imageable_type',
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
