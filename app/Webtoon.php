<?php

namespace App;

use App\HasImage;

class Webtoon extends HasImage
{
  protected $table = 'webtoons';

  protected $fillable = ['path', 'path_s'];

  public static function boot()
  {
    parent::boot();

    static::creating(function($webtoon){

      $user = $webtoon->get_user();

      $user->coins = $user->coins+3;
      $user->practice = $user->practice+1;
      $user->experience = $user->experience+3;
      $user->passion = $user->passion>=150?150:$user->passion+1;

      $user->save();

    });//static::creating

    static::deleted(function($webtoon){

      $user = $webtoon->get_user();

      $user->coins = $user->coins-3;
      $user->practice = $user->practice-1;
      $user->experience = $user->experience-3;
      $user->passion = $user->passion<=0?0:$user->passion-1;

      $user->save();

    });//static::creating
  }

  public function is_author($id)
  {
    return $this->section->is_author($id);
  }

  public function get_story()
  {
    return $this->section->get_story();
  }

  public function get_user()
  {
    return $this->section->get_user();
  }

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
