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

    static::created(function($webtoon){

      $webtoon->get_user()->created_webtoon_bonus();

    });//static::creating

    static::deleted(function($webtoon){

      $webtoon->get_user()->deleted_webtoon_deduction();

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
