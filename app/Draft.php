<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model implements Scorable
{
  protected $table = 'drafts';

  protected $fillable = ['title', 'description', 'content'];

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

  public function ups()
  {
    return $this->morphMany('App\Up', 'imageable');
  }
}
