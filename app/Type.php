<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Type extends Model
{
  public function getTypes($user_id, $type, $quantity)
  {
    $types = DB::table($type)->where('user_id', $user_id)->paginate($quantity);
  }
}
