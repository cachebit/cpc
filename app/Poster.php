<?php

namespace App;


class Poster extends Type implements Publishable
{
  protected $table = 'posters';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'genre',
  ];
}
