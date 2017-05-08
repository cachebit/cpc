<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webtoon extends Model
{
  protected $table = 'webtoons';

  protected $fillable = ['path'];

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
