<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Gallery extends Model
{
  protected $table = 'galleries';

  public static function boot()
  {
    parent::boot();

    static::updating(function($gallery){

      $scores = $gallery->imageable->scores;
      $score_array = explode(' ', $scores);
      $sum = (float)0.0;
      $n = count($score_array);
      $grade = 0.0;
      $diff = 0;
      for($i = 1; $i < $n; $i++)
      {
        if($score_array[$i] == '')
        {
          $diff++;
        }else{
          $sum+=$score_array[$i];
        }
      }
      $grade = (float)$sum/$score_array[0];

      $grade = round($grade, 2);

      $gallery->imageable->score = $grade;
      $gallery->imageable->save();

      //还要更新user的aesthetic。
      $scores = $gallery->scores;

      $scores->each(function ($score, $key) {
        $user = $score->get_user();
        $user_scores = $user->scores;

        $user_scores = $user_scores->filter(function ($item) {
          return !$item->gallery->scorable;
        });

        $n = count($user_scores);
        $sum = 0.00;
        if($n)
        {
          for($i = 0; $i < $n; $i++)
          {
            $user_score = $user_scores[$i];
            $score_final = $user_score->gallery->imageable->score;
            $sum+=abs(($user_score->score - $score_final)*100)/$score_final;
          }

          $user->aesthetic = round(1.5*(100.00 - $sum/$n), 2);
          $user->save();
        }

      });

    });//static::updating
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
