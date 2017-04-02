<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
  protected $table = 'posters';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'genre',
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
