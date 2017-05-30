<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
  protected $table = 'scores';

  public static function boot()
  {
    parent::boot();

    static::creating(function($score){

      $user = $score->get_user();

      $user->coins = $user->coins+1;
      $user->experience = $user->experience+1;
      $user->passion = $user->passion>=150?150:$user->passion+1;

      $user->save();

    });//static::creating
  }

  public function get_user()
  {
    return $this->user;
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function gallery()
  {
    return $this->belongsTo('App\Gallery');
  }
}
