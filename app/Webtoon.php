<?php

namespace App;

use App\HasImage;

class Webtoon extends HasImage
{
  protected $table = 'webtoons';

  protected $fillable = ['path', 'path_s'];

  public function is_author($id)
  {
    return $this->section->is_author($id);
  }

  public function get_story()
  {
    return $this->section->get_story();
  }

  public function get_user()
  {
    return $this->section->get_user();
  }

  public function section()
  {
    return $this->belongsTo('App\Section');
  }
}
