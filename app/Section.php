<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  protected $table = 'sections';

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function story()
  {
    return $this->belongsTo('App\Story');
  }

  public function texts()
  {
    return $this->hasMany('App\Text');
  }

  public function webtoons()
  {
    return $this->hasMany('App\Webtoon');
  }

  public function multiple_frames()
  {
    return $this->hasMany('App\MultipleFrame');
  }
}
