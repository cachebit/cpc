<?php

namespace App;

use App\HasImage;

class Poster extends HasImage
{
  protected $table = 'posters';

  protected $fillable = ['title', 'description', 'path', 'path_s'];

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
