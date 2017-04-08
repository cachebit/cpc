<?php

namespace App;


class Draft extends Type implements Publishable
{
  protected $table = 'drafts';

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'genre',
  ];
}
