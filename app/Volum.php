<?php

namespace App;

use App\HasImage;

class Volum extends HasImage implements Sectionable
{

  protected $table = 'volums';

  protected $fillable = ['title', 'description'];

  public static function boot()
  {
    parent::boot();

    static::created(function($volum){

      $volum->get_user()->created_volum_bonus();

    });//static::creating

    static::deleted(function($volum){

      $volum->get_user()->deleted_volum_deduction();

    });//static::creating
  }

  public function is_author($id)
  {
    return $this->story->user_id === $id;
  }

  public function setTitleAttribute($title)
  {
    if(!(starts_with($title, '《') && str_finish($title, '》'))){
      $this->attributes['title'] = '《'.$title.'》';
    }else{
      $this->attributes['title'] = $title;
    }
  }

  public function get_user()
  {
    return $this->story->user;
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
