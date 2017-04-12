<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  protected $fillable = [
    'user_id',
    'imageable_id',
    'imageable_type',
  ];
}
