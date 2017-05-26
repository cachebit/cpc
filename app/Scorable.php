<?php

namespace App;

interface Scorable
{
  public function get_score();

  public function set_score($score);
}
