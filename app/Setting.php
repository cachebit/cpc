<?php

namespace App;

use App\HasImage;

class Setting extends HasImage implements Scorable
{
  protected $table = 'settings';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

  public static function boot()
  {
    parent::boot();

    static::created(function($setting){

      $setting->get_user()->created_setting_bonus();

    });//static::creating

    static::deleted(function($setting){

      $setting->get_user()->deleted_setting_deduction();

    });//static::creating
  }

  static public function lastest($n)
  {
    $sketch = new static;
    return $sketch->orderBy('created_at', 'desc')->paginate($n);
  }

  public function user_uped($id)
  {
    return $this->ups()->where('user_id', $id)->first();
  }

  public function is_author($id)
  {
    return $this->story->is_author($id);
  }

  public function get_user()
  {
    return $this->story->user;
  }

  public function get_score()
  {
    return $this->score;
  }

  public function set_score($score)
  {
    $this->score = $score;
    return $this->save();
  }

  public function story()
  {
    return $this->belongsTo('App\Story');
  }

  public function galleries()
  {
    return $this->morphMany('App\Gallery', 'imageable');
  }

  public function ups()
  {
    return $this->morphMany('App\Up', 'imageable');
  }
}
