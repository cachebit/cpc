<?php

namespace App;


class Novella extends Type implements Publishable
{
  protected $table = 'novellas';

  protected $fillable = [
    'section',
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
