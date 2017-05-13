<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volum extends Model
{

  protected $table = 'volums';

  protected $fillable = ['title', 'description', 'volum'];

  public function setTitleAttribute($title)
  {
    $this->attributes['title'] = '《'.$title.'》';
  }

  public function story()
  {
    return $this->belongsTo('App\Story');
  }

  public function covers()
  {
      return $this->morphMany('App\Cover', 'imageable');
  }
}
