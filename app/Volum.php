<?php

namespace App;

use App\HasImage;

class Volum extends HasImage
{

  protected $table = 'volums';

  protected $fillable = ['title', 'description', 'volum'];


  public function setTitleAttribute($title)
  {
    if(!(starts_with($title, '《') && str_finish($title, '》'))){
      $this->attributes['title'] = '《'.$title.'》';
    }else{
      $this->attributes['title'] = $title;
    }
  }

  public function story()
  {
    return $this->belongsTo('App\Story');
  }

  public function sections()
  {
    return $this->morphMany('App\Section', 'imageable');
  }

  public function covers()
  {
      return $this->morphMany('App\Cover', 'imageable');
  }
}
