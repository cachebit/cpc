<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Gallery extends Model
{
  protected $table = 'galleries';

  public function user_scorable(User $user)
  {
    if($this->scores()->where('user_id', $user->id)->first() === null && !$this->imageable->is_author($user->id))
    {
      return true;
    }else{
      return false;
    }
  }

  public function scorable(User $user)
  {
    if($this->scores()->where('user_id', $user->id)->first() === null)
    {
      return true;
    }else{
      return false;
    }
  }

  public function is_author($id)
  {
    return $this->imageable->is_author($id);
  }

  public function get_user()
  {
    return $this->imageable->get_user();
  }

  public function get_score()
  {
    return $this->imageable->score;
  }

  public function scored()
  {
    $this->scorable = false;
    $this->save();
    return $this->all()->random();
  }

  public function get_img()
  {
    $belong = $this->imageable;

    return $belong->path;
  }

  public function get_thumbnail()
  {
    $belong = $this->imageable;

    return $belong->path_s;
  }

  public function get_description()
  {
    return $this->imageable->description;
  }

  public function get_title()
  {
    return $this->imageable->title;
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function imageable()
  {
    return $this->morphTo();
  }

  public function scores()
  {
    return $this->hasMany('App\Score');
  }
}
