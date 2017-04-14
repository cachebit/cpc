<?php

namespace App;


class Novel extends Type implements Publishable
{
  protected $table = 'novels';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'volum',
    'section',
    'genre',
  ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function webtoons()
  {
      return $this->morphMany('App\Webtoon', 'imageable');
  }

  public function single_frames()
  {
      return $this->morphMany('App\SingleFrame', 'imageable');
  }

  public function multiple_frames()
  {
      return $this->morphMany('App\MultipleFrame', 'imageable');
  }

  public function scenarios()
  {
      return $this->morphMany('App\Scenario', 'imageable');
  }
}
