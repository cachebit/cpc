<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Up extends Model
{
  protected $table = 'ups';

  public static function boot()
  {
    parent::boot();

    static::creating(function($up){

      $user = $up->user;

      $user->coins = $user->coins+1;
      $user->experience = $user->experience+1;
      $user->passion = $user->passion>=150?150:$user->passion+1;

      $user->save();

    });//static::creating

    static::deleted(function($up){

      $user = $up->user;

      $user->coins = $user->coins-1;
      $user->experience = $user->experience-1;
      $user->passion = $user->passion<=0?0:$user->passion-1;

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

  public function imageable()
  {
    return $this->morphTo();
  }
}
