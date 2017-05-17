<?php

namespace App;

use App\HasImage;

class Volum extends HasImage
{

  protected $table = 'volums';

  protected $fillable = ['title', 'description', 'volum'];



  public function setTitleAttribute($title)
  {
    $this->attributes['title'] = '《'.$title.'》';
  }

  public function story()
  {
    return $this->belongsTo('App\Story');
  }

  public function covers()
  {
      return $this->morphMany('App\Cover', 'imageable');
  }
}
