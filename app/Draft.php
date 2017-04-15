<?php

namespace App;


class Draft extends Type implements Publishable
{
  protected $table = 'drafts';

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

  public function scenarios()
  {
      return $this->morphMany('App\Scenario', 'imageable');
  }
}
