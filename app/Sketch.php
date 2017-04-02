<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sketch extends Model
{
  protected $table = 'sketches';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
  ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function single_frames()
  {
      return $this->morphMany('App\SingleFrame', 'imageable');
  }
}
