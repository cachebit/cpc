<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
  protected $table = 'drafts';

  protected $fillable = ['title', 'description', 'content'];

  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
