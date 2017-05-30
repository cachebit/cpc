<?php

namespace App;

use App\HasImage;
use Auth;

class Section extends HasImage
{
  protected $table = 'sections';

  protected $fillable = ['title', 'description', 'volum'];

  public static function boot()
  {
    parent::boot();

    static::creating(function($section){

      $user = $section->get_user();

      $user->practice = $user->practice+1;
      $user->experience = $user->experience+1;
      $user->passion = $user->passion>=150?150:$user->passion+1;

      $user->save();

    });//static::creating
  }

  public function is_author($id)
  {
    if($this->imageable instanceof \App\Story){
      return $id === $this->imageable->user_id;
    }elseif($this->imageable instanceof \App\Volum){
      return $id === $this->imageable->story->user_id;
    }else{
      return false;
    }
  }

  public function get_story()
  {
    $belong = $this->imageable;
    if($belong instanceof \App\Volum)
    {
      return $belong->story;
    }elseif($belong instanceof \App\Story){
      return $belong;
    }
  }

  public function get_user()
  {
    return $this->imageable->get_user();
  }

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
