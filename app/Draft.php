<?php

namespace App;


class Draft extends Type implements Publishable
{
  protected $table = 'drafts';

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

  public function scenarios()
  {
      return $this->morphMany('App\Scenario', 'imageable');
  }
}
