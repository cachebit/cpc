<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleFrame extends Model
{
  protected $table = 'multiple_frames';

  protected $fillable = [
    'user_id',
    'path',
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
