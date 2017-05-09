<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{

  protected $table = 'stories';

  protected $fillable = ['title', 'description', 'cover'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function posters()
  {
    return $this->hasMany('App\Poster');
  }

  public function settings()
  {
    return $this->hasMany('App\Setting');
  }

  public function sketches()
  {
    return $this->hasMany('App\Sketch');
  }

  public function drafts()
  {
    return $this->hasMany('App\Draft');
  }

  public function sections()
  {
    return $this->hasMany('App\Section');
  }
}
