<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
  protected $table = 'drafts';

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

  public function scenarios()
  {
      return $this->morphMany('App\Scenario', 'imageable');
  }
}
