<?php

namespace App;


class Setting extends Type implements Publishable
{
  protected $table = 'settings';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'genre',
  ];
}
