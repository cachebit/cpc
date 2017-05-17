<?php

namespace App;

use App\HasImage;

class Story extends HasImage
{

  protected $table = 'stories';

  protected $fillable = ['title', 'description'];

  public function setTitleAttribute($title)
  {
    if(!(starts_with($title, '《') && str_finish($title, '》'))){
      $this->attributes['title'] = '《'.$title.'》';
    }else{
      $this->attributes['title'] = $title;
    }
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function posters()
  {
    return $this->hasMany('App\Poster');
  }

  public function settings()
  {
    return $this->hasMany('App\Setting');
  }

  public function sketches()
  {
    return $this->hasMany('App\Sketch');
  }

  public function drafts()
  {
    return $this->hasMany('App\Draft');
  }

  public function sections()
  {
    return $this->morphMany('App\Section', 'imageable');
  }

  public function volums()
  {
    return $this->hasMany('App\Volum');
  }

  public function covers()
  {
      return $this->morphMany('App\Cover', 'imageable');
  }
}
