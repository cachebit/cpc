<?php

namespace App;

use App\HasImage;

class MultipleFrame extends HasImage
{
  protected $table = 'multiple_frames';

  protected $fillable = ['path', 'path_s'];

  public static function boot()
  {
    parent::boot();

    static::created(function($multiple_frame){

      $multiple_frame->get_user()->created_multiple_frame_bonus();

    });//static::creating

    static::deleted(function($multiple_frame){

      $multiple_frame->get_user()->deleted_multiple_frame_deduction();

    });//static::creating
  }

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
