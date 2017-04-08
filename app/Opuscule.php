<?php

namespace App;


class Opuscule extends Type implements Publishable
{
  protected $table = 'opuscules';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'genre',
  ];
}
