<?php

namespace App;


class Novel extends Type implements Publishable
{
  protected $table = 'novels';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'volum',
    'section',
    'genre',
  ];
}
