<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
  protected $table = 'texts';

  protected $fillable = ['body'];

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
