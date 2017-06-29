<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Up extends Model
{
  protected $table = 'ups';

  public static function boot()
  {
    parent::boot();

    static::created(function($up){

      $up->user->created_up_bonus();

    });//static::creating

    static::deleting(function($up){

      $up->user->deleted_up_deduction();

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
