<?php

namespace App;

use App\HasImage;

class MultipleFrame extends HasImage
{
  protected $table = 'multiple_frames';

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
