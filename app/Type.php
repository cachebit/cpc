<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Type extends Model
{

  protected $fillable = [
    'user_id',
    'published_at',
    'score',
    'scored',
    'title',
    'genre',
  ];

  public function getTypes($user_id, $type, $quantity)
  {
    $types = DB::table($type)->where('user_id', $user_id)->paginate($quantity);
  }
}
