<?php

namespace App;


class Draft extends Type implements Publishable
{
  protected $table = 'drafts';
}
