<?php

namespace App;


class Novella extends Type implements Publishable
{
  protected $table = 'novellas';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'section',
    'genre',
  ];
}
