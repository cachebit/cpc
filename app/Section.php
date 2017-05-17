<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  protected $table = 'sections';

  protected $fillable = ['title', 'description', 'volum'];

  public function imageable()
  {
    return $this->morphTo();
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

  public function covers()
  {
      return $this->morphMany('App\Cover', 'imageable');
  }
}
