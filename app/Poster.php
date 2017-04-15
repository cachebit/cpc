<?php

namespace App;


class Poster extends Type implements Publishable
{
  protected $table = 'posters';

  protected $fillable = [
    'published_at',
    'title',
  ];

  protected $datas = ['published_at'];

  /**
  * type->published();
  *
  **/
  public function scopePublished($query)
  {
    $query->where('published_at', '<=', 'Carbon::now()');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function single_frames()
  {
      return $this->morphMany('App\SingleFrame', 'imageable');
  }
}
