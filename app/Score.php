<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
  protected $table = 'scores';

  public static function boot()
  {
    parent::boot();

    static::created(function($score){

      $score->get_user()->created_score_bonus();

    });//static::creating

    static::deleted(function($score){

      $$score->get_user()->deleted_score_deduction();

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
