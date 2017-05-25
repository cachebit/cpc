<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
  protected $table = 'drafts';

  protected $fillable = ['title', 'description', 'content'];

  public function is_author($id)
  {
    return $this->story->is_author($id);
  }

  public function get_user()
  {
    return $this->story->user;
  }

  public function story()
  {
    return $this->belongsTo('App\Story');
  }
}
