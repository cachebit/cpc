<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Jobs\GalleryImageableScoreUpdate;
use App\Jobs\UserAestheticUpdate;

use App\User;
use Queue;

class Gallery extends Model
{
  protected $table = 'galleries';

  public static function boot()
  {
    parent::boot();

    static::updating(function($gallery){

      $gallery->update_imageable_score($gallery);

      $gallery->update_user_aesthetic($gallery);


    });//static::updating

    static::creating(function($gallery){

      $user = $gallery->get_user();

      $user->practice = $user->practice+1;
      $user->experience = $user->experience+3;
      $user->passion = $user->passion>=150?150:$user->passion+1;

      $user->save();

    });//static::creating

    static::deleted(function($gallery){

      $user = $gallery->get_user();

      $user->practice = $user->practice-1;
      $user->experience = $user->experience-3;
      $user->passion = $user->passion<=0?0:$user->passion-1;

      $user->save();

    });//static::creating
  }

  //队列函数
  //更新imageable的分数
  protected function update_imageable_score(Gallery $gallery)
  {
    Queue::push(new GalleryImageableScoreUpdate($gallery));
  }

  protected function update_user_aesthetic(Gallery $gallery)
  {
    Queue::push(new UserAestheticUpdate($gallery));

  }

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
    return;
  }

  public function unscored()
  {
    $this->scorable = true;
    $this->save();
    return;
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
