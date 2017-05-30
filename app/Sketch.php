<?php

namespace App;

use App\HasImage;

class Sketch extends HasImage implements Scorable
{
  protected $table = 'sketches';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

  public static function boot()
  {
    parent::boot();

    static::creating(function($sketch){

      $user = $sketch->get_user();

      $user->coins = $user->coins+3;
      $user->practice = $user->practice+1;
      $user->experience = $user->experience+3;
      $user->passion = $user->passion>=150?150:$user->passion+1;

      $user->save();

    });//static::creating
  }

  static public function lastest($n)
  {
    $sketch = new static;
    return $sketch->orderBy('created_at', 'desc')->paginate($n);
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
