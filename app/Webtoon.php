<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webtoon extends Model
{
  protected $table = 'webtoons';

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
