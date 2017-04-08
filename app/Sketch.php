<?php

namespace App;


class Sketch extends Type implements Publishable
{
  protected $table = 'sketches';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'genre',
  ];
}
