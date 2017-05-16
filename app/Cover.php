<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Image;
use Auth;
use File;

class Cover extends Model
{
  protected $table = 'covers';

  protected $fillable = ['cover', 'cover_m', 'cover_s'];

  public function imageable()
  {
    return $this->morphTo();
  }
}
