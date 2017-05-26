<?php

namespace App;

use App\HasImage;

class Setting extends HasImage implements Scorable
{
  protected $table = 'settings';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

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
