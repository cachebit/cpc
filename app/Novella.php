<?php

namespace App;


class Novella extends Type implements Publishable
{
  protected $table = 'novellas';

  array_push($fillable, 'section');
}
