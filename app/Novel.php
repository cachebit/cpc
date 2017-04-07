<?php

namespace App;


class Novel extends Type implements Publishable
{
  protected $table = 'novels';
  
  array_push($fillable, 'volum', 'section');
}
