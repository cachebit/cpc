<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
  protected $table = 'covers';

  protected $fillable = ['cover', 'cover_m', 'cover_s'];

  public function get_story()
  {
    $belong = $this->imageable;
    if($belong instanceof \App\Volum)
    {
      return $belong->story;
    }elseif($belong instanceof \App\Story){
      return $belong;
    }elseif($belong instanceof \App\Section){
      return $belong->get_story();
    }
  }

  public function get_user()
  {
    return $this->imageable->get_user();
  }

  public function imageable()
  {
    return $this->morphTo();
  }
}
